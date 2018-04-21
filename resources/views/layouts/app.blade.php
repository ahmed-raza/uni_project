<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('flexslider/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('colorbox/colorbox.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('colorbox/jquery.colorbox-min.js') }}"></script>
    <script type="text/javascript" src="flexslider/jquery.flexslider.js"></script>
    {!! Html::script('ckeditor/ckeditor.js') !!}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').select2({
                theme: "bootstrap"
            });
            $(".ad-group").colorbox({
                rel:'ad-group',
                transition:"fade",
                width: "75%",
                height: "75%",
            });
        });
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- {{ config('app.name') }} --}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{!! Request::is('ads') ? 'active' : '' !!}"><a href="{{ route('ads.index') }}">Ads</a></li>
                        <li class={{ Request::is('ads/create') ? 'active' : '' }}><a href="{{ route('ads.create') }}">Post an Ad</a></li>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <li class={{ Request::is('admin/dashboard') ? 'active' : '' }}><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                    <li><a href="{{ route('user.ads', Auth::user()->id) }}">My Ads</a></li>
                                    <li class="divider"></li>
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
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @include('partials.messages')
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
</body>
</html>
