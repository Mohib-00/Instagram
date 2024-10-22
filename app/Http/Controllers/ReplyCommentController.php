<?php

namespace App\Http\Controllers;

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
}
