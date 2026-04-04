<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
        $users = User::where('id','!=',Auth::id())->get();

        $messages = Message::where(function($q){
            $q->where('sender_id',Auth::id())
              ->orWhere('receiver_id',Auth::id());
        })->orderBy('created_at','asc')->get();

        return view('messages', compact('users','messages'));
    }


    public function store(Request $request)
    {
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);

        return back();
    }

}
