<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    use HasFactory;
    protected $fillable = [
        'follow_id',  
        'user_id',   
        'confirm_status',
    ];

    public function follow()
    {
        return $this->belongsTo(Follow::class, 'follow_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');  
    }
}
