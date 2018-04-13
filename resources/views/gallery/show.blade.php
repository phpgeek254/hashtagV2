@extends('master')
@section('content')
    <script>
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
        Dropzone.options.addImages = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 8, // MB
            uploadMultiple: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>
    <div class="container">
        <div class="row">

            <div class="col s12 card" style="padding: 10px;">
                    <h5 class="center black-text"> {{ $gallery->gallery_name }}</h5>
            </div>
        </div>
                @if(count($images) > 0)
                    @foreach( $images->chunk(3) as $chunk)
                        <div class="row">
                            @foreach($chunk as $page)
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image">
                                        <img  width='100' height="200" class='materialboxed' src="{{ asset($page->image_path) }}">
                                    </div>
                                    <div class="card-content">
                                        @if(Auth::user() and Auth::user()->user_level == 1)
                                            <div class="form">
                                                {!! Form::open(['route'=>['image.destroy', $page->id], 'method'=>'delete']) !!}
                                                <button class="btn"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>

                    @endforeach
                @endif
    <div class="row">
        @if(Auth::user() and Auth::user()->user_level == '1')
            <div class="row">
                <div class="col s2"></div>
                <div class="col s8 card" style="padding: 20px;">
                {!! Form::open(['route'=>'image.store', 'files'=>true, "class"=>"dropzone",
                "id"=>"addImages"]
                 ) !!}
                    {!! Form::hidden('gallery_id', $gallery->id) !!}
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                {!!  Form::close() !!}
                </div>
                <div class="col s2"></div>
            </div>
        @endif
    </div>
    </div>

@endsection