<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSend;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $currentCustomer = $request->user();

        $message = Message::create([
            'sender_id' =>   $currentCustomer->Customer_ID,
            'sender_type' => Customer::class,
            'receiver_id' => $request->receiver_id,
            'receiver_type' => User::class,
            'message' => $request->message,
        ]);

        broadcast(new MessageSend($message))->toOthers();

        return response()->json(['status' => 'sent']);
    }

     public function getChat(Request $request)
    {
        $currentCustomer = $request->user();

        $messages = Message::where(function ($q) use ($currentCustomer) {
            $q->where('sender_id', 1)
                ->where('sender_type', User::class)
                ->where('receiver_id', $currentCustomer->Customer_ID)
                ->where('receiver_type', Customer::class);
        })->orWhere(function ($q) use ($currentCustomer) {
            $q->where('sender_id', $currentCustomer->Customer_ID)
                ->where('sender_type', Customer::class)
                ->where('receiver_id', 1)
                ->where('receiver_type', User::class);
        })->orderBy('created_at', 'asc')->get();

        return response()->json([
            'recipient' => $currentCustomer,
            'messages' => $messages,
        ]);
    }
}
