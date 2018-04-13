@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m2"></div>
            <div class="col s12 m8 animated fadeInDown" style="padding: 10px; background: #fff;">
                <h4 class="center black-text"> Register Here </h4>
                <h5 class="center"> Register </h5>
                {!! Form::open(['route'=>'register']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name') !!}
                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email') !!}

                    @if ($errors->has('email'))
                        <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password') !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('password-confirm', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation') !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Register', ['class'=>'btn']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col m2"></div>
        </div>
    </div>
@endsection
