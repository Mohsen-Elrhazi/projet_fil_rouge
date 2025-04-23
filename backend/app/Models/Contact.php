<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'sender_id',
    //     'recipient_id',
    //     'status',
    // ];
    
    // // Relation avec l'utilisateur qui initie la demande    
    // public function sender()
    // {
    //     return $this->belongsTo(User::class, 'sender_id');
    // }
    
    // // Relation avec l'utilisateur ciblé (le contact)
    // public function recipient()
    // {
    //     return $this->belongsTo(User::class, 'recipient_id');
    // }

}