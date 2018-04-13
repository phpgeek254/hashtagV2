@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            @if(count($gallerys) > 0)
            @foreach( $gallerys as $gallery)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        @if(count($gallery->images)>=1)
                        <img  width='100' height="200" class='materialboxed' src="{{ asset($gallery->images->first()->image_path) }}">
                        @else
                        <img width='100' height="200" class='materialboxed' src="{{ asset('images/logo.jpg') }}">
                        @endif
                            <span class="card-title">{{ $gallery->gallery_name }}</span>
                        <a href="{{route('gallerys.show', ['id'=>$gallery->id]) }}" class="btn-floating halfway-fab waves-effect waves-light black"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <div class="card-content">
                        @if( Auth::user() and Auth::user()->user_level ==1)
                      <div class="form">
                          {!! Form::open(['route'=>['gallerys.destroy', $gallery->id], 'method'=>'delete']) !!}
                          <button class="btn"><i class="fa fa-trash"></i></button>
                          {!! Form::close() !!}
                      </div> <span class="badge">{{ count($gallery->images) }} images available </span>
                        @endif

                    </div>

                </div>
            </div>
                @endforeach

                @endif
        </div>
        <div class="row">
            <div class="col s12 center">
                {{ $gallerys->links() }}
            </div>
        </div>


    @if(Auth::user() and Auth::user()->user_level ==1)
        <div class="row">
            <div class="col m12 s12 center-align">
                <a class="btn" href="{{route('gallerys.create')}}">
                    <i class="fa fa-plus"></i> Add new Gallery</a>
            </div>
        </div>
            @endif
    </div>
@endsection