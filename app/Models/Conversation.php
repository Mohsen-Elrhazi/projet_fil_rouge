<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user1_id',
        'user2_id',
    ];

    public function user1()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public static function firstOrCreateBetweenUsers($user1, $user2)
    {
        // Chercher d'abord si une conversation existe déjà dans n'importe quel ordre
        $conversation = static::where(function ($query) use ($user1, $user2) {
            $query->where('user1_id', $user1->id)
                ->where('user2_id', $user2->id);
        })
            ->orWhere(function ($query) use ($user1, $user2) {
                $query->where('user1_id', $user2->id)
                    ->where('user2_id', $user1->id);
            })
            ->first();

        if ($conversation) {
            return $conversation;
        }

       
        $userIds = [$user1->id, $user2->id];
        sort($userIds); 

        return static::create([
            'user1_id' => $userIds[0], 
            'user2_id' => $userIds[1]  
        ]);
    }
}