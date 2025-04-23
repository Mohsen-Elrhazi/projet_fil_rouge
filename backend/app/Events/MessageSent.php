<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $receiverId;
    public $message;
    public $messageId;
    public $createdAt;

    public function __construct(User $sender, $receiverId, $message, $messageId, $createdAt)
    {
        $this->sender = $sender;
        $this->receiverId = $receiverId;
        $this->message = $message;
        $this->messageId = $messageId;
        $this->createdAt = $createdAt;
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('chat.'.$this->receiverId),
            new PrivateChannel('chat.'.$this->sender->id)
        ];
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }

    public function broadcastWith()
    {
        return [
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name,
                'avatar' => $this->sender->profile->avatar ?? null,
            ],
            'message' => $this->message,
            'message_id' => $this->messageId,
            'created_at' => $this->createdAt->toDateTimeString(),
        ];
    }
}