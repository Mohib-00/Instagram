<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
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
            'message' => 'nullable|string|max:500',
        ]);
    
        $message = new Message();
        $message->sender_id = $request->input('sender_id');
        $message->receiver_id = $request->input('receiver_id');
        $message->user_id = $request->input('user_id');
        $message->message = $request->input('message');
    
        
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $fileMime = $file->getMimeType();
    
           
            if (strstr($fileMime, "video/")) {
                $filePath = $file->storeAs('videos', $fileName, 'public');
                $message->video = $filePath;  
    
            
            } else if (strstr($fileMime, "image/")) {
                $filePath = $file->storeAs('images', $fileName, 'public');
                $message->image = $filePath;  
            }
        }
    
        $message->save();
    
        return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
    }
    
 
    public function getMessages($userId)
    {
        
        $followingUsers = Auth::user()->following()->get();
    
        
        $messages = Message::where(function($query) use ($userId) {
                $query->where('sender_id', Auth::user()->id)
                      ->where('receiver_id', $userId);
            })
            ->orWhere(function($query) use ($userId) {
                $query->where('sender_id', $userId)
                      ->where('receiver_id', Auth::user()->id);
            })
            ->get();
    
        
        if (request()->ajax()) {
             return response()->json(['messages' => $messages]);
        }   
    
       
        return view('message', compact('followingUsers', 'messages'));
    }
    

public function show($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    
    $user->user_image = asset('images/' . $user->user_image); 

    return response()->json(['user' => $user]);
}


    
}

