<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['reel_id', 'user_id', 'comment'];

    public function reel()
    {
        return $this->belongsTo(Reel::class,'reel_id','id');
    }

    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
