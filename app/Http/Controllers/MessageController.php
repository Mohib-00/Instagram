<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Reel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    
        
        $message->uniquetimestamp = time();
    
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            
            if ($file->isValid()) {
                $uniqueTimestamp = time();  
                $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
        
                
                if (strpos($file->getMimeType(), 'image/') === 0) {
                    $file->move(public_path('images'), $fileName);  
                    $message->image = 'images/' . $fileName;   
                } 
                
                else {
                    $file->move(public_path('videos'), $fileName);  
                    $message->video = 'videos/' . $fileName;   
                }
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


public function getConversations(Request $request)
{
    $receiverId = $request->input('receiver_id'); 
    $lastCheckedUniqueTimestamp = $request->input('lastCheckedUniqueTimestamp');

    if (!is_numeric($lastCheckedUniqueTimestamp)) {
        return response()->json(['error' => 'Invalid timestamp'], 400);
    }
     
    $authUserId = Auth::user()->id;

    $conversations = Message::with('user')
        ->where(function($query) use ($authUserId, $receiverId, $lastCheckedUniqueTimestamp) {
            $query->where('sender_id', $authUserId)
                  ->where('receiver_id', $receiverId)
                  ->where('uniquetimestamp', '>', $lastCheckedUniqueTimestamp);
        })
        ->orWhere(function($query) use ($authUserId, $receiverId, $lastCheckedUniqueTimestamp) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', $authUserId)
                  ->where('uniquetimestamp', '>', $lastCheckedUniqueTimestamp);
        })
        ->get();

    
    $updatedConversations = Message::with('user')
        ->where(function($query) use ($authUserId, $receiverId, $lastCheckedUniqueTimestamp) {
            $query->where('sender_id', $authUserId)
                  ->where('receiver_id', $receiverId)
                  ->where('updatedtimestamp', '>', $lastCheckedUniqueTimestamp);
        })
        ->orWhere(function($query) use ($authUserId, $receiverId, $lastCheckedUniqueTimestamp) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', $authUserId)
                  ->where('updatedtimestamp', '>', $lastCheckedUniqueTimestamp);
        })
        ->get();

    return response()->json(['conversations' => $conversations, 'updatedConversations' => $updatedConversations]);
}

public function forwardReel(Request $request)
{
    $request->validate([
        'message' => 'nullable|string',
        'sender_id' => 'required|integer|exists:users,id',
        'receiver_ids' => 'required|array',
        'receiver_ids.*' => 'integer|exists:users,id',
        'reel_image' => 'nullable|string',
        'reel_video' => 'nullable|string',
    ]);

   
    foreach ($request->receiver_ids as $receiver_id) {
        Message::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $receiver_id,
            'user_id' => $request->sender_id,
            'message' => $request->message,
            'reel_image' => $request->reel_image, 
            'reel_video' => $request->reel_video,  
        ]);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Reel forwarded successfully!',
    ]);
}

}

