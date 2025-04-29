<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
 
    public function index()
    {
         // recupere les conversations avec le dernier message et le contact
         $conversations = Conversation::where('user1_id', Auth::id())
         ->orWhere('user2_id', Auth::id())
         ->with(['user1.profile', 'user2.profile'])
         ->get()
         ->map(function ($conversation) {
             $conversation->contact = $conversation->user1_id === Auth::id() 
                 ? $conversation->user2 
                 : $conversation->user1;
             return $conversation;
         });

     return view('chat.index', compact('conversations'));
    }
    public function show(User $contact)
    {
        $user = Auth::user();
        
        // Trouver ou créer la conversation
        $conversation = Conversation::firstOrCreateBetweenUsers($user, $contact);
        
        
        // Récupérer les messages de la conversation
        $messages = $conversation->messages()
                        ->with('sender')
                        ->orderBy('created_at', 'asc')
                        ->get();
        
        return view('chat.show', [
            'contact' => $contact,
            'conversation' => $conversation,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request, User $contact)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        // $senderId = Auth::id(); 
        // $receiverId = $contact->id; 
        $user = Auth::user();
        
    
        // Trouver ou créer une conversation entre ces deux utilisateurs
        $conversation = Conversation::firstOrCreateBetweenUsers($user, $contact);
        
    
        
        $message = new Message();
        $message->sender_id = $user->id;
        $message->content = $request->content;
        $message->conversation_id = $conversation->id;
        $message->save();

         $message->load('sender');
        
         broadcast(new MessageSent($message))->toOthers();
         
         return response()->json([
            'status' => 'success',
            'message' => [
                'id' => $message->id,
                'content' => $message->content,
                'sender_id' => auth()->id(),
                'created_at' => $message->created_at->format('H:i')
            ]
        ]);

    }
  
    
      
}