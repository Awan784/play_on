<header class="header sticky-top">
    <nav class="navbar navbar-expand-md py-2">
        <div class="container"><a class="navbar-brand" href="#">
                <a href="{{ url('/homescreen') }}"><img class="rounded " src="{{ asset('front/logo.png') }}" alt="logo"
                        height="40"></a>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                        <li><a class="nav-link text-white" href="{{ route('venue') }}">Venue</a></li>
                        </li>
                        <li class="nav-item">
                        <li><a class="nav-link text-white" href="{{ url('') }}">Contact</a></li>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                            <li><a class="nav-link text-white" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <li class="nav-item">
                            <li><a class="nav-link text-white" href="{{ route('login') }}">Login</a></li>
                            </li>
                            <li class="nav-item">
                            <li><a class="nav-link text-white" href="{{ route('register.type') }}">Register</a></li>
                            </li>
                            </li>
                        @endif
                    </ul>
                </div>
        </div>
    </nav>
</header>
