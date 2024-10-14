<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'user_id',
        'message',
    ];

    // Relationship to the sender (User who sent the message)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    // Relationship to the receiver (User who received the message)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    // Relationship to the user (if needed)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
