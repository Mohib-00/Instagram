<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',        
        'image_path',     
        'video_path',     
        'caption',        
        'hide_like',      
        'hide_comments',  
        'likes',          
        'comments',       
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
