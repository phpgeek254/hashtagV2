@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            @foreach( $magazines as $magazine)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        @if(count($magazine->pages)>0)
                        <img  width='100' height="200" class='materialboxed' src="{{ asset($magazine->pages->first()->page_path) }}">
                        @else
                        <img width='100' height="200" class='materialboxed' src="{{ asset('images/logo.jpg') }}">
                        @endif
                            <span class="card-title">{{ $magazine->magazine_name }}</span>
                        <a href="{{route('magazine.show', ['id'=>$magazine->id]) }}" class="btn-floating halfway-fab waves-effect waves-light black"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <div class="card-content">
                       <span class="badge">{{ count($magazine->pages) }} Pages </span>
                        @if(Auth::user() and Auth::user()->user_level == 1)
                        {!! Form::open(['route'=>['magazine.destroy', $magazine->id], 'method'=>'delete']) !!}
                        <button class="btn"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                            @endif
                    </div>

                </div>
            </div>
                @endforeach
        </div>
        @if(Auth::user() and Auth::user()->user_level==1)
        <div class="row">
            <div class="col m12 s12 center-align"><a class="btn" href="{{route('magazine.create')}}"><i class="fa fa-plus"></i> Add new magazine</a></div>
        </div>
            @endif
    </div>
@endsection