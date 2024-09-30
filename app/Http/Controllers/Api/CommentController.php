<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::with('user')
            ->where('manga_id', $request->manga_id)
            ->orWhere('volume_id', $request->volume_id)
            ->get();

        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content = $request->content;
        $comment->manga_id = $request->manga_id;
        $comment->volume_id = $request->volume_id;
        $comment->save();

        return response()->json($comment);
    }
}
