<?php

namespace App\Http\Controllers;

use App\Models\LikeComment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'reply_comment' => 'required|string|max:255',
        ]);

        
        $replyComment = ReplyComment::create([
            'comment_id' => $request->comment_id,
            'user_id' => Auth::id(),  
            'reply_comment' => $request->reply_comment,
        ]);

        return response()->json([
            'success' => true,
            'reply' => $replyComment,  
        ]);
    }

    public function likeComment(Request $request)
    {
        $commentId = $request->input('comment_id');
        $userId = Auth::id();

       
        $like = LikeComment::firstOrCreate(
            ['comment_id' => $commentId, 'user_id' => $userId],
            ['likes' => 0]
        );

        
        $like->likes = $like->likes === 0 ? 1 : 0;
        $like->save();

        return response()->json([
            'status' => 'success',
            'liked' => $like->likes === 1,
            'message' => 'Comment like status updated successfully.',
        ]);
    }
}
