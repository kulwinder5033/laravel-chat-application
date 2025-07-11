<?php

namespace App\Http\Controllers\User;

use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        return view('user.chat.index');
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();

        return view('user.chat.broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('user.chat.receive', ['message' => $request->get('message')]);
    }
}
