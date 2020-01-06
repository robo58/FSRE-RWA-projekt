<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Game Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/freelancer.min.css') }}" rel="stylesheet">
    <style>
        body{
            background-image:url("{{ asset('img/halo5.jpg') }}")!important;
        }
        .py-4{

            padding-top: 8rem !important;
        }
        .profile-image{
            width: 150px;
            background-color: rgba(0,0,0,0.3);
        }
        .social-media-links{
            width: 150px;
        }
        .social-media-links a{
            color: #666;
        }
        .social-media-links a:hover{
            color: #444;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase">
            <div class="container">
                <a class="navbar-brand text-uppercase font-weight-bold text-white rounded" href="{{ url('/') }}">
                    Game Shop
                </a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">Menu
                    <i class="fas fa-bars"></i> 
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-uppercase font-weight-bold text-white rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-uppercase font-weight-bold text-white rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase font-weight-bold text-white rounded" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('profiles.show',Auth::user())}}">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                                <a class="dropdown-item" href="{{route('profiles.edit',Auth::user())}}">
                                    <i class="fas fa-user"></i>Edit Profile
                                </a>
                                @can('manage-users')
                                <div class="dropdown-divider"></div>
                                <a href="{{route('admin.users.index')}}" class="dropdown-item">
                                    <i class="fas fa-users"></i> User Management
                                </a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>