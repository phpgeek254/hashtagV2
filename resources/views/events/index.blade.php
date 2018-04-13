@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            @foreach( $events as $event)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            @if(count($event->event_images)>=1)
                                <img  width='100' height="200" class='materialboxed' src="{{ asset($event->event_images->first()->image_path) }}">
                            @else
                                <img width='100' height="200" class='materialboxed' src="{{ asset('images/logo.jpg') }}">
                            @endif
                            <span class="card-title">{{ $event->title }}</span>
                            <a href="{{route('events.show', ['id'=>$event->id]) }}" class="btn-floating halfway-fab waves-effect waves-light black"><i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <div class="card-content">
                            <p> {{ $event->venue }}</p>
                            <p> {{ $event->start_date }} <span class="badge">
                                    {{  count($event->event_images) }} images available
                                </span></p>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(Auth::user() and Auth::user()->user_level==1)
            <div class="row">
                <div class="col m12 s12 center-align"><a class="btn" href="{{route('events.create')}}"><i class="fa fa-plus"></i> Add new Event</a></div>
            </div>
        @endif
    </div>
@endsection