<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        
        $request->validate([
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
            'user_id' => 'required|integer',
            'message' => 'required|string|max:500',
        ]);

      
        $message = new Message();
        $message->sender_id = $request->input('sender_id');
        $message->receiver_id = $request->input('receiver_id');
        $message->user_id = $request->input('user_id');
        $message->message = $request->input('message');
        $message->save();

        
        return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
    }

    public function getMessages($receiverId)
    {
        $userId = Auth::id();
         
        $followingUsers = Auth::user()->following()->get();
       
        $messages = Message::where(function($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $receiverId);
        })->orWhere(function($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', $userId);
        })->get();
    
        
        if (request()->ajax()) {
            return response()->json($messages);
        }
     
        return view('message', compact('followingUsers', 'messages'));
    }
    
}

