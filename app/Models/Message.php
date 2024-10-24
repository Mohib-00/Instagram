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
        'image',
        'video',
        'reel_image',
        'reel_video',
    ];

   
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

   
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
