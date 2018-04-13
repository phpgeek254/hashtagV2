<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hashtagmagazine254') }}</title>
    <link rel="icon" href="{{ asset('images/logo.ico') }}">

    <!-- Styles -->
    {{--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}
    <!--Import materialize.css-->
    @yield('css')
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/animate.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/font_awesome/css/font_awesome.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.clockpicker.css')}}"  media="screen,projection"/>
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css') !!}
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/clockpicker.js') }}"></script>
    <script src="{{ asset('js/turn.js') }}"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.js"></script>
    <script src="https://cloud.tinymce.com/4/tinymce.min.js?apiKey=xicrxoowpkno6hqeo6n4ul2htuqtu8875091snwpi72zc7zs" type="text/javascript"></script>
    <script type="text/javascript">

        $(function(){
            $(".dropdown-button").dropdown();
            $(".button-collapse").sideNav();
            $('.carousel.carousel-slider').carousel({fullWidth: true});
        });
        autoplay();
        function autoplay() {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 4500);
        }

        tinymce.init({
            selector: 'textarea'
        });
    </script>
{{-- Google Analytics Script --}}
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-105403604-1', 'auto');
        ga('send', 'pageview');

    </script>

    {{--End Analytics Script.--}}

</head>
<body>
    <!-- Authentication Links -->

{{-- Navigation goes here --}}
<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo"><img width="50" src="{{asset('images/logo.jpg')}}" alt=""></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse">
            <i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
        @include('partials.navbar')
        </ul>
        <ul class="side-nav" id="mobile-demo">
            @include('partials.navbar')
        </ul>
    </div>
</nav>
    <!-- Dropdown Structure -->
@yield('content')

@include('partials.footer')

</body>
</html>
