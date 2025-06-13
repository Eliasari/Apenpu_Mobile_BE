<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MessageSend  implements ShouldBroadcastNow
{

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('apenpu-chat');
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message->message,
            'sender_type' => class_basename($this->message->sender_type),
            'sender_id' => $this->message->sender_id,
            'receiver_type' => class_basename($this->message->receiver_type),
            'receiver_id' => $this->message->receiver_id,
            'created_at' => $this->message->created_at->toDateTimeString(),
        ];
    }

    public function broadcastAs()
    {
        return 'message';
    }
}
