<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $table = 'follows';
    protected $fillable = [
        'follow_id',
        'following_id',
        'user_id',
        'confirm_status'
    ];

    public function follower()
    {
        return $this->belongsTo(User::class, 'follow_id','id');
    }

    public function following()
    {
        return $this->belongsTo(User::class, 'following_id', 'id');
    }
}
