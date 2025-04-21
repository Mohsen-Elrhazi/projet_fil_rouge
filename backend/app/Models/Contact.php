<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contact_id',
        'status',
    ];
    
    // Relation avec l'utilisateur qui initie la demande    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation avec l'utilisateur ciblé (le contact)
    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }
    
}