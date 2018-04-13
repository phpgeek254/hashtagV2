<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function store(Request $request)
    {
        $post = Post::findOrFail($request->all()['post_id']);
        $this->validate($request, [
            'comment_content' => 'required|max:1000'
        ]);

        $comment = new Comment();
        $comment->comment_content = $request->comment_content;
        $comment->user_id = Auth::id();
        $post->comments()->save($comment);
        return back()->with(array('success'=>'Comment Successfully saved'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
