<?php

namespace App\Http\Controllers;

use App\MyStory;
use App\User;
use Illuminate\Http\Request;

class MyStoryController extends Controller
{
    private $destination = 'story_images/';

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
        $this->validate($request, [
           'file_path'=>'image|mimes:png,jpg,jpeg,bmp',
            'caption'=>'required'
        ]);

        $file_name = null;
        $file_path = null;
        if($request->file('file_path'))
        {
            $file_name = uniqid().$request->file('file_path')->getClientOriginalName();
            $file_path = $this->destination.$file_name;
        }
        $user = User::findOrFail($request->all()['user_id']);

        $story =  new MyStory();
        $story->caption = $request->all()['caption'];
        $story->file_path = $file_path;
        $user->story()->save($story);
        $request->file('file_path')->move($this->destination, $file_name);
        return redirect()->back()->with(['message'=>'Storey Successfully Added']);
    }


    public function show(MyStory $myStory)
    {
        //
    }


    public function edit(MyStory $myStory)
    {
        //
    }


    public function update(Request $request, MyStory $myStory)
    {
        //
    }


    public function destroy(MyStory $myStory)
    {
        //
    }
}
