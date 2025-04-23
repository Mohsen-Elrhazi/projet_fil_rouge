<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function getDiscussions()
    {
        $userId = auth()->id();

        // Récupère les IDs des utilisateurs avec qui l'utilisateur actuel a conversé
        $conversationUserIds = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->select('sender_id', 'receiver_id')
            ->get()
            ->flatMap(function ($message) use ($userId) {
                return [$message->sender_id, $message->receiver_id];
            })
            ->unique()
            ->filter(function ($id) use ($userId) {
                return $id != $userId;
            });

        // Récupère les utilisateurs avec le dernier message
        $conversations = User::whereIn('id', $conversationUserIds)
            ->with([
                'sentMessages' => function ($query) use ($userId) {
                    $query->where('receiver_id', $userId)->latest();
                },
                'receivedMessages' => function ($query) use ($userId) {
                    $query->where('sender_id', $userId)->latest();
                }
            ])
            ->get()
            ->map(function ($user) use ($userId) {
                $lastSent = $user->sentMessages->first();
                $lastReceived = $user->receivedMessages->first();

                $user->last_message = collect([$lastSent, $lastReceived])
                    ->filter()
                    ->sortByDesc('created_at')
                    ->first();

                return $user;
            })
            ->sortByDesc(function ($user) {
                return $user->last_message ? $user->last_message->created_at : null;
            });

        return $conversations;
    }

    public function index()
    {
        $conversations = $this->getDiscussions();
        return view('app.chat.discussions.index', compact('conversations'));
    }

    public function show($id)
    {
        $receiver = User::findOrFail($id);
        $sender_id = auth()->id();

        $messages = Message::where(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $sender_id)
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', $sender_id);
        })->orderBy('created_at', 'asc')
            ->get();

        $conversations = $this->getDiscussions();

        return view('app.chat.discussions.show', compact('receiver', 'messages', 'conversations'));
    }


    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $sender_id = auth()->id();
        $receiver_id = $request->receiver_id;

        // Créer le message
        $message = Message::create([
            'conversation_id' => 0,
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message' => $request->message,
        ]);

        // Diffuser l'événement via Pusher
        broadcast(new MessageSent($message));

        // Répondre en fonction du type de requête
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => $message
            ]);
        }

        return redirect()->back();
    }

    /**
     * Trouve ou crée une conversation entre deux utilisateurs
     */
    private function findOrCreateConversation($userId1, $userId2)
    {
        // Pour l'instant, retournons un objet factice avec juste un ID
        // puisque votre code actuel n'utilise pas réellement les conversations
        return (object) ['id' => 0];

        // Lorsque vous implémenterez le modèle Conversation, vous pourrez utiliser ce code:
        /*
        $conversation = Conversation::where(function ($query) use ($userId1, $userId2) {
            $query->whereHas('users', function ($q) use ($userId1) {
                $q->where('user_id', $userId1);
            })->whereHas('users', function ($q) use ($userId2) {
                $q->where('user_id', $userId2);
            });
        })->first();

        if (!$conversation) {
            $conversation = Conversation::create();
            $conversation->users()->attach([$userId1, $userId2]);
        }

        return $conversation;
        */
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        if ($message->sender_id == auth()->user()->id || $message->receiver_id == auth()->user()->id) {
            $message->delete();
            return redirect()->back()->with('success', 'Message deleted successfully');
        }
    }

    /**
     * Déclenche manuellement un événement Pusher (utilisé pour le débogage)
     */
    public function triggerPusherEvent(Request $request)
    {
        $request->validate([
            'channel' => 'required|string',
            'event' => 'required|string',
            'data' => 'required|array'
        ]);

        // Utilisation directe de la façade Pusher pour déclencher un événement
        \Illuminate\Support\Facades\Broadcast::channel($request->channel, function () {
            return true;
        });

        // Déclencher l'événement sur le canal demandé
        event(new \Illuminate\Broadcasting\PusherBroadcastingEvent(
            $request->channel,
            $request->event,
            $request->data
        ));

        return response()->json(['success' => true]);
    }
}