@extends('master')
@section('content')
    <div class="col m2 s2"></div>
    <div class="col m8 s8 card">
        {!! Form::model($post, ['route'=>'posts.update']) !!}
        @include('posts._form')
        {!! Form::submit('save', ['class'=>'btn']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col m2 s2"></div>
@endsection