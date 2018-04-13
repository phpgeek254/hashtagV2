@extends('master')
@section('content')
    <style>
       .indicators{
           display: none;
        }
    </style>
    <script>
        $(function () {
            $('.slider').slider();
            $('.carousel.carousel-slider').carousel({fullWidth: true});
        });
    </script>
<div class="container">
    <div class="row">
        <div class="col m12 s12">
        {{-- The slide for the top page goes here --}}
            <div class="slider">
                <ul class="slides">

                    @if(count($events) >0 )

                    @foreach($events as $event)

                        <li>
                            @if(count($event->event_images)>=1)
                                <img src="{{ asset($event->event_images->first()->image_path) }}">
                            @else
                                <img width='100' height="200" class='materialboxed' src="{{ asset('images/logo.jpg') }}">
                            @endif
                            <div class="caption left-align">
                                <h3>{{ $event->title }}</h3>
                                <h5 class="light grey-text text-lighten-3">
                                   On : {{ $event->start_date }}
                                    <br> Venue : {{ $event->venue }}
                                </h5>
                            </div>
                        </li>

                    @endforeach
                    @else
                        @foreach($photography->images->take(20) as $image)
                        <li>
                                <img class='materialboxed responsive-img' src="{{ asset($image->image_path) }}">
                            <div class="caption left-align" style="background: rgba(0, 0, 0, 0.45); padding: 20px;">
                                <h6>
                                    Hashtag Magazine 254 <br>
                                    <small><i>Presenting</i></small><br>

                                    {{ $photography->gallery_name }}
                                </h6>

                                <h5 class="light grey-text text-lighten-3">
                                    Giving you the ultimate Hashtag Experience...
                                </h5>
                            </div>
                        </li>
                        @endforeach
                            @endif

                </ul>
            </div>
        </div>
        </div>
    <div class="row">
        <div class="col s12 m4">

        <hr class="show-on-medium-and-up" style="border: double 2px white;">
            <h5 class="center"> Latest Magazine </h5>
        <hr class="show-on-medium-and-up" style="border: double 2px white;">

            <h6 class="panel-default center"> {{ $magazine->first()->magazine_name  }} </h6>
            <div class="carousel carousel-slider">
            @foreach($magazine->first()->pages as $page)
                    <div class="carousel-fixed-item center">
                        <button class="btn white-text">
                            {{ link_to_route('magazine.show', 'Check It Out', ['id'=>$magazine->first()->id], ['class'=>'white-text']) }}
                        </button>
                    </div>
            <a class="carousel-item" href="#{{ $page->id }}!">
            {!! Html::image(asset($page->page_path), null, ['class'=>'responsive-img']) !!} <!-- random image -->
            </a>

            @endforeach
            </div>
        </div>


        @if(count($posts)>0)
        <div class="col m4 s12">
            <hr class="show-on-medium-and-up" style="border: double 2px white;">

            <h5 class="center"> Most Recent Posts </h5>
            <hr class="show-on-medium-and-up" style="border: double 2px white;">

            <h6 class="center">
               {{ $posts->first()->title }}
           <span class="badge">{{ $posts->first()->created_at->diffForHumans() }}</span>
           </h6>
            <p>
                {!! \Illuminate\Support\Str::words($posts->first()->post_content, 80,'....')  !!}
            </p>
            {{ link_to('posts', 'Read more', ['class'=>'btn']) }}
        </div>
        @endif


        <div class="col m4 s12">
            @if(count($events)> 0)
                <hr class="show-on-medium-and-up" style="border: double 2px white;">

                <h5 class="center"> Upcoming Events </h5>
                <hr class="show-on-medium-and-up" style="border: double 2px white;">

                <h6 class="panel-default"> {{$events->first()->title }}
                <span class="badge">{{ $events->first()->start_date }}</span>
           </h6>
            <p class="black-text">
            {!! \Illuminate\Support\Str::words($events->first()->description, 80,'....') !!}
       </p>
       <br>
       {{ link_to('events', 'Read more', ['class'=>'btn']) }}
           @else
           <hr class="show-on-medium-and-up" style="border: double 2px white;">

           <h5 class="center">{{ $gallery->gallery_name }} </h5>
           <hr class="show-on-medium-and-up" style="border: double 2px white;">

           <div class="carousel carousel-slider">
               @foreach($gallery->images->take(20) as $image)
                   <div class="carousel-fixed-item center">

                   </div>
                   <a class="carousel-item" href="#{{ $image->id }}!">
                   {!! Html::image(asset($image->image_path), null, ['class'=>'responsive-img']) !!} <!-- random image -->
                        </a>
                    @endforeach
            @endif
        </div>




    </div>
</div>
</div>

@endsection