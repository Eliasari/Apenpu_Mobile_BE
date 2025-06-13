<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSend;

class MessageController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('chat.index', compact('customers'));
    }

    public function show(Customer $customer)
    {

        $messages = Message::where(function ($q) use ($customer) {
            $q->where('sender_id', Auth::id())
                ->where('sender_type', User::class)
                ->where('receiver_id', $customer->Customer_ID)
                ->where('receiver_type', Customer::class);
        })->orWhere(function ($q) use ($customer) {
            $q->where('sender_id', $customer->Customer_ID)
                ->where('sender_type', Customer::class)
                ->where('receiver_id', Auth::id())
                ->where('receiver_type', User::class);
        })->orderBy('created_at', 'asc')->get();

        return view('chat.show', [
            'recipient' => $customer,
            'messages' => $messages,
        ]);
    }

    public function send(Request $request)
    {
        $currentCustomer = $request->user();

        $message = Message::create([
            'sender_id' => Auth::id(),
            'sender_type' => User::class,
            'receiver_id' => $request->receiver_id,
            'receiver_type' => Customer::class,
            'message' => $request->message,
        ]);

        broadcast(new MessageSend($message))->toOthers();

        return response()->json(['status' => 'sent']);
    }

}
