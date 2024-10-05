<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        $request->validate([
            'following_id' => 'required|exists:users,id',
        ]);

         
        Follow::create([
            'follow_id' => Auth::id(),  
            'following_id' => $request->following_id, 
            'user_id' => Auth::id(), 
        ]);

        return response()->json(['success' => true, 'message' => 'You are now following this user.']);
    }

    public function unfollow(Request $request)
    {
        $request->validate([
            'following_id' => 'required|exists:users,id',
        ]);

      
        Follow::where('follow_id', Auth::id())
              ->where('following_id', $request->following_id)
              ->delete();

        return response()->json(['success' => true, 'message' => 'You have unfollowed this user.']);
    }

    public function confirmFollowRequest($id)
{
    $followRequest = Follow::find($id);  
    
    if ($followRequest) {
        $followRequest->confirm_status = 1;  
        $followRequest->save();  

        return response()->json(['success' => true, 'message' => 'Request confirmed!']);
    }

    return response()->json(['success' => false, 'message' => 'Request not found.']);
}

}

