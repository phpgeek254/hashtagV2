@extends('master')

@section('content')
<div class="container">
    <div class="row animated fadeInDown">
        <div class="col m2 s2"></div>
        <div class="col m8 s8 white">
            <h5 class="center black-text"> Login Here </h5>
            <div class="row">
                {!! Form::open(['route', 'login']) !!}
                <div class="input-field col s12">
                    {!! Form::label('email', 'Email Address') !!}
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                    <span class="help-block">{{ $errors->first('email') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 ">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', null, ['class'=>'form-control']) !!}
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>
            </div>
            <div class="row">

                <div class="input-field col s12 ">
                    {!! Form::submit('Login', ['class'=>'btn']) !!}
                </div>
            </div>
        </div>
        <div class="col m2 s2"></div>

    </div>

</div>
@endsection
