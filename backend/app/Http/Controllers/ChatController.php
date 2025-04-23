<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
   
    
    public function index()
    {
        $userId = auth()->id();
    
        // dd(auth()->user()); 
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
            ->with(['sentMessages' => function($query) use ($userId) {
                $query->where('receiver_id', $userId)->latest();
            }, 'receivedMessages' => function($query) use ($userId) {
                $query->where('sender_id', $userId)->latest();
            }])
            ->get()
            ->map(function($user) use ($userId) {
                $lastSent = $user->sentMessages->first();
                $lastReceived = $user->receivedMessages->first();
                
                $user->last_message = collect([$lastSent, $lastReceived])
                    ->filter()
                    ->sortByDesc('created_at')
                    ->first();
                    
                return $user;
            })
            ->sortByDesc(function($user) {
                return $user->last_message ? $user->last_message->created_at : null;
            });
    
        return view('app.chat.discussions.index', compact('conversations'));
    }

    public function show($id)
{
    $receiver = User::findOrFail($id);
    $sender_id = auth()->id();
    
    $messages = Message::where(function($query) use ($sender_id, $id) {
        $query->where('sender_id', $sender_id)
              ->where('receiver_id', $id);
    })->orWhere(function($query) use ($sender_id, $id) {
        $query->where('sender_id', $id)
              ->where('receiver_id', $sender_id);
    })->orderBy('created_at', 'asc')
      ->get();
    
    return view('app.chat.discussions.show', compact('receiver', 'messages'));
}

public function sendMessage(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'message' => 'required|string|max:255',
    ]);

    $message = Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'message' => $request->message,
    ]);

    $receiver = User::findOrFail($request->receiver_id);
    
    broadcast(new MessageSent(auth()->user(), $receiver->id, $message->message, $message->id, $message->created_at))->toOthers();

    if ($request->wantsJson()) {
        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    return back()->with('success', 'Message envoyé');
}

 

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        if ($message->sender_id == auth()->user()->id || $message->receiver_id == auth()->user()->id) {
            $message->delete();
            return redirect()->back()->with('success', 'Message deleted successfully');
        }
    }

    
    
}