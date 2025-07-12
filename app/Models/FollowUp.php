<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sender_user_id',
        'message',
        'follow_up_date',
        'provider',
        'provider_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }   
}
