<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReelController extends Controller
{
    public function store(Request $request)
    {
      
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'hide_like' => 'boolean',
            'hide_comments' => 'boolean',
            'file' => 'required',
        ]);
    
        
        $reel = new Reel();
        $reel->user_id = auth()->id();
        $reel->caption = $request->caption;
        $reel->hide_like = $request->input('hide_like') ? 1 : 0;
        $reel->hide_comments = $request->input('hide_comments') ? 1 : 0;
    
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file->isValid()) {
                
                $uniqueTimestamp = time();  
                $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
    
                 
                if (strpos($file->getMimeType(), 'image/') === 0) {
                     
                    $file->move(public_path('images'), $fileName);  
                    $reel->image_path = 'images/' . $fileName;  
                } else {
                    
                    $file->move(public_path('videos'), $fileName);  
                    $reel->video_path = 'videos/' . $fileName;  
                }
            }
        }
    
       
        $reel->save();
    
       
        return response()->json(['message' => 'Reel created successfully!', 'reel' => $reel], 201);
    }
    

    public function save(Request $request)
    {
        $request->validate([
            'reel_id' => 'required|exists:reels,id',  
            'comment' => 'required|string|max:255',  
        ]);
    
        // Create and save the comment
        $comment = new Comment();
        $comment->reel_id = $request->reel_id;
        $comment->user_id = Auth::id();  
        $comment->comment = $request->comment;
        $comment->save();
    
        // Retrieve the user who made the comment
        $user = Auth::user();
    
        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully!',
            'comment' => [
                'user_image' => $user->user_image, // User's image
                'user_name' => $user->name, // User's name
                'comment_text' => $comment->comment, // Comment text
            ]
        ], 201);
    }
    

public function getComments($id)
    {
        // Fetch comments for the reel with related user info
        $comments = Comment::where('reel_id', $id)
            ->with('user:id,name,user_image') // Assuming Comment belongs to User
            ->get();

        // Return comments with user details as JSON
        return response()->json([
            'comments' => $comments
        ]);
    }
    
}

