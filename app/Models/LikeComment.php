<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    use HasFactory;

   
    protected $table = 'likes_comments';

    protected $fillable = ['comment_id', 'user_id', 'likes'];

    
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
