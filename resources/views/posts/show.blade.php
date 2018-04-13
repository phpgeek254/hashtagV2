@extends('master')
@section('content')
    <script>
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });

    </script>
    <div class="container">
        <div class="row">
            <div class="col s12 card">
                @if(Auth::user() and Auth::user()->user_level == '1')
                    {{ link_to_route('posts.edit', 'Edit Post', ['id'=>$post->id], ['class'=>'btn']) }}
                    @endif
                <div class="card-content">
                    <h5> {{ $post->title }}
                    <span class="badge">by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</span></h5>
                        {!! $post->post_content !!}
                </div>
                <div class="row center">
                    @foreach( $post->images as $image)
                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-image">
                                        <img  width='100' height="200" class='materialboxed' src="{{ asset($image->image_path) }}">
                                </div>
                                <div class="card-content">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        @if(Auth::user() and Auth::user()->user_level == '1')
            <div class="row">
                <div class="col s12 card" style="padding: 10px;">
                    <h4 class="center"> Add An Image </h4>
                {!! Form::open(['route'=>'postimage.store', 'files'=>true]) !!}
                    {!! Form::hidden('post_id', $post->id) !!}

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
            </div>
        @endif

        <div class="row">
            <div class="col s12 card">
                <div class="card-content">
                    <h3> Comments <span class="badge"> {{ count($post->comments) }} </span></h3>
                    @foreach($post->comments as $comment)

                        <div class="card">
                            <div class="card-content">
                                <h6> {{ App\User::find($comment->user_id)->email }} <span class="badge">
                                        {{ $comment->created_at->diffForhumans() }}
                                    </span></h6>
                                <p>
                                    {!! html_entity_decode(nl2br(e($comment->comment_content))) !!}
                                </p>
                            </div>

                        </div>

                    @endforeach
                </div>
            </div>
        </div>

            <div class="row card">
                @if( Auth::user())
                {!! Form::open(['route'=>['comments.store']]) !!}
                {!! Form::hidden('post_id', $post->id) !!}
                <div class="row" style="padding: 10px;">
                    <h4 class="center"> Add Comment </h4>
                    <div class="input-field col s12 " >
                        {{ Form::label('comment_content', 'Comment') }}
                        {!! Form::textarea('comment_content', null, ['class'=>'materialize-textarea']) !!}
                        <span class="error"> {{ $errors->first('comment_content') }}</span>
                    </div>
                    <div class="input-field col s12 ">
                        {!! Form::submit('Add Comment', ['class'=>'btn']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                @endif
            </div>
    </div>

@endsection