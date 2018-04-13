@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col m2 s2"></div>
            <div class="col m8 s8 card" style="padding: 10px;">
                <h4 class="center"> Edit Event: {{ $event->title }}</h4>
                {!! Form::model($event, ['route'=>['events.update', $event->id], 'method'=>'PATCH']) !!}
                @include('events._form')
                {!! Form::submit('save', ['class'=>'btn']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col m2 s2"></div>
        </div>
    </div>

@endsection