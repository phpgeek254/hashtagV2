@extends('master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col m2 s2"></div>
            <div class="col m8 s8 card animated fadeInLeft" style="padding: 10px;">
                <h4 class="center"> Add A Post </h4>
            {!! Form::open(['route'=>'posts.store']) !!}
                @include('posts._form')
            {!! Form::submit('save', ['class'=>'btn']) !!}
            {!! Form::close() !!}
            </div>
            <div class="col m2 s2"></div>
        </div>
    </div>
@endsection