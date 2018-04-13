@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::user() and Auth::user()->user_level ==1)
                {{ link_to_route('events.edit', 'Edit Event', ['id'=>$event->id], ['class'=>'btn']) }}
            @endif
        <div class="col m12 s12">
            <h4>{{ $event->title }}</h4>
            <h5>{{ $event->venue }}</h5>
            <p>{!! $event->description !!} </p>
            <p>{{ $event->start_date }}</p>
            <p>{{ $event->end_date }}</p>

        </div>
        </div>

        <div class="row">
            @if(count($event->event_images) >= 1)
            @foreach($event->event_images as $image)

                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img class="materialboxed" src="{{asset($image->image_path)}}">
                            </div>
                            <div class="card-content">
                                @if(Auth::user() and Auth::user()->user_level == 1)
                                    {!! Form::open(['route'=>['event_image.destroy', $image->id], 'method'=>'delete']) !!}
                                    <button class="btn"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
            @endforeach
                @endif
        </div>
        <div class="row">
            @if(Auth::user() and Auth::user()->user_level == '1')
                <div class="row">
                    <div class="col s2"></div>
                    <div class="col s8 card animated slideInDown" style="padding: 20px;">
                        <h4 class="center"> Add Poster </h4>
                        {!! Form::open(['route'=>'event_image.store', 'files'=>true]) !!}
                        {!! Form::hidden('event_id', $event->id) !!}

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                {!! Form::file('image_path') !!}

                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                                @if($errors)
                                    <span class="help-block">{{ $errors->first('image_path') }}</span>
                                @endif
                            </div>
                            <div class="button" style="margin: 10px;">
                                {!! Form::submit('Add Image', ['class'=>'btn']) !!}
                            </div>
                        </div>

                        {!!  Form::close() !!}
                    </div>
                    <div class="col s2"></div>
                </div>
            @endif
        </div>
    </div>
@endsection