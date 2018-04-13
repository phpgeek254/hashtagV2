@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col m2 s2"></div>
            <div class="col m8 s8 card" style="padding: 10px;">
                <h4> Add New Event </h4>
            {!! Form::open(['route'=>'events.store']) !!}
                @include('events._form')
            {!! Form::submit('Save Event', ['class'=>'btn']) !!}
            {!! Form::close() !!}
            </div>
            <div class="col m2 s2"></div>
        </div>
    </div>
@endsection