<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostImageController extends Controller
{
    public function __construct()
    {
//        $this->middleware('Admin');
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $this->validate($request, [
            'image_path' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $image_path = null;
        $file = $request->file('image_path');
        $file_name = uniqid().$file->getClientOriginalName();
        $destination = 'post_images/';
        $image_path = $destination.$file_name;
        $file->move($destination,$file_name);

        $post_image = new PostImage();
        $post_image->image_path = $image_path;
        $post->images()->save($post_image);
        return back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }
}
