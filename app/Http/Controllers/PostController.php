<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    public function index(Post $post)
    {
        //load all posts in the descending order, using order by desc.
        $posts = $post->with('user')->orderByDesc('created_at')->get();
        
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        //send the user to the form to create the form
        return view('posts.create');
    }

    public function show(Post $post)
    {
        //load the post and all the comments on it.
        $post->with('images')->get();
        return view('posts.show', compact('post'));
    }


    public function edit($id)
    {
        //Load the post for editing
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'post_content'=>'required',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->post_content = $request->post_content;
        $post->save();
        return redirect('/posts');
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->validate($request, [
            'title'=>'required',
            'post_content'=>'required',
        ]);
        $post->update($request->all());
        return redirect('/posts');
    }

    public function comments($id)
    {
        $comments = Post::findOtFail($id)->comments();
        return $comments;
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');

    }
}
