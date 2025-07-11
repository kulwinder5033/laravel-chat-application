<?php

namespace App\Http\Controllers\User;

use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    { 
        $chats = Chat::where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('user.chat.index',compact('chats'));
    }

    public function broadcast(Request $request)
    {
        Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => (auth()->id()==1)?2:1,
            'message' => $request->get('message'),
            'is_read' => false,
        ]);
        return view('user.chat.broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('user.chat.receive', ['message' => $request->get('message')]);
    }
}
