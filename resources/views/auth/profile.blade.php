@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/logo.jpg') }}">
                        <span class="card-title">{{ $user->name }}</span>
                    </div>
                    <div class="card-content">
                    <h5 class="center"> Profile Info</h5>
                    Name : {{ $user->name }}
                    Email : {{ $user->email }}
                    </div>
                    <div class="card-action">
                        <a href="edit">Edit Profile </a>
                    </div>
                </div>
            </div>
@include('auth.add_story')
            <div class="col s12 m8">
                <div class="card">
                    <h5 class="center"> Your Stories </h5>
                    <ul class="collection">
                        @forelse(App\MyStory::where('user_id', $user->id)->get() as $story)
                            <li class="collection-item avatar">
                                <img src="{{ asset($story->file_path) }}" alt="" class="circle">
                                <span class="title"></span>
                                <p>{!! $story->caption !!}
                                    <span class="right">{{ $story->created_at->diffForHumans() }}</span>
                                    <br>

                                    <a href="#!"> Delete </a>
                                </p>

                            </li>


                            @empty
                            <p class="center"> No Stories yet.</p>
                            @endforelse
                    </ul>
                <div class="card-action">
                    <a href="#add_story" class="btn"> Add Story </a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection