<li><a href="/">Home</a></li>
<li><a href="/gallerys">Gallery</a></li>
<li><a href="/events">Events</a></li>
<li><a href="/magazine">Magazine</a></li>
<li><a href="/posts">Blog</a></li>

@if (Auth::guest())
    <li><a href="/about">About Us</a></li>
    <li><a href="/contact">Contact Us</a></li>
    {{--<li><a href="/stories"> Recent Stories</a></li>--}}
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>

@else
    <li><a href="/profile"> Profile </a></li>
    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
@endif