<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request, $postId)
    {
        // 🔍 Check if post exists
        $post = BlogPost::find($postId);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        // ✅ Validate input
        $request->validate([
            'comment' => 'required|string'
        ]);

        // ✅ Create the comment
        $comment = Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::id(),
            'comment' => $request->comment
        ]);

        return response()->json($comment, 201);
    }
}
