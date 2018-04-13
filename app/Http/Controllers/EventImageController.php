<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventImage;
use Illuminate\Http\Request;

class EventImageController extends Controller
{

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
        $this->validate($request,
            ['image_path'=>'required|image|mimes:jpg,jpeg,png,gif']);
        $event = Event::findOrFail($request->event_id);
        $image_path = null;
        $file = $request->file('image_path');
        $file_name = uniqid().$file->getClientOriginalName();
        $destination = 'event_images/';
        $image_path = $destination.$file_name;
        $file->move($destination,$file_name);

        $image = new EventImage();
        $image->image_path = $image_path;
        $event->event_images()->save($image);
        return redirect()->back();
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
        $image = EventImage::findOrFail($id);
        $image->delete();
        $message = 'The image successfully removed';
        return redirect()->back()->with(compact('message'));
    }
}
