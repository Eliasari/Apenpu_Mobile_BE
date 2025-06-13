<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    
    protected $fillable = ['sender_id', 'sender_type', 'receiver_id', 'receiver_type', 'message'];

    protected $casts = [
        'message' => 'encrypted',
    ];

    public function sender()
    {
        return $this->morphTo();
    }

    public function receiver()
    {
        return $this->morphTo();
    }
}
