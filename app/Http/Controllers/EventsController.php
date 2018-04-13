<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    public function index(Event $event)
    {
        //load all the events and their images
        $events = $event->with('event_images')->orderByDesc('created_at')->get();
        return view('events.index', compact('events'));


    }


    public function create()
    {
        //
        return view('events.create');
    }


    public function store(Request $request)
    {
        //
        $this->validate($request, [
        'title'=>'required',
        'description'=>'required',
        'venue'=>'required',
        'start_date'=>'required|date|after:today',
        'end_date'=>'required|date|after:'.$request->start_date,
        ]);

        $event = new Event();
        $event->create($request->all());
        return redirect('events');
    }


    public function show($id)
    {
        $event = Event::with('event_images')->find($id);
        return view('events.show', compact('event'));
    }


    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }


    public function update(Request $request, Event $event)
    {
        //
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'venue'=>'required',
            'start_date'=>'required|date|after:today',
            'end_date'=>'required|date|after:'.$request->start_date,
        ]);

        $event->update($request->all());
        $success = ' The event was successfully updated';
        return redirect(route('events.show', ['id'=>$event->id]))->with(compact('success'));

    }


    public function destroy($id)
    {

    }
}
