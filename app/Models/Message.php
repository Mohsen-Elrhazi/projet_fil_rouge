<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'content',
        'conversation_id',
        'group_id',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

   
}