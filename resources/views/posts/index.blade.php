@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <h5 class="center">Welcome To Hashtagmagazine254 Blog</h5>

            <ul class="collection">
            @foreach($posts as $post)
                    <li class="collection-item avatar">
                        <img src="{{asset('images/logo.jpg')}}" alt="" class="circle">
                        <span class="title center" style="font-size: 20px; font-weight: bold;">{{ $post->title }}</span>
                        {!! \Illuminate\Support\Str::words($post->post_content, 120,'....')  !!}
                        {{ link_to_route('posts.show', 'Read more', ['id'=>$post->id]) }}
                        <a class="secondary-content">{{ $post->created_at->diffForHumans() }}</a>
                    </li>

            @endforeach
            </ul>
        </div>


        <div class="row">
            @if(Auth::user() and Auth::user()->user_level ==1)
                <div class="col s12">
                    <a href="{{ route('posts.create') }}" class="btn">
                        <i class="fa fa-plus"> </i> Add New Post
                    </a>
                </div>
            @endif
        </div>
    </div>
        </div>
@endsection