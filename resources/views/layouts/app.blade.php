<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/zakham_logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}" class="logo-size" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold text-dark" href="{{ route('login') }}">تسجيل الدخول</a>
                                </li>
                            @endif
                            <li class="vertical-bar"></li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold text-dark" href="{{ route('register') }}">انشاء حساب</a>
                                </li>
                            @endif
                            <li class="nav-item mt-2">
                                <i class="fas fa-user-circle"></i>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if (\Request::is('/'))
                            <li class="nav-item mt-2">
                                <a class="nav-link text-dark" href="#homeFooter" data-href="#homeFooter">تواصل معنا</a>
                            </li>
                        @endif
                        @if (\Request::is('/') && !Auth::check())
                            <li class="nav-item mt-2">
                                <a class="nav-link text-dark" href="#section-top-init" data-href="#section-top-init">المبادرات</a>
                            </li>
                        @elseif(Auth::check())
                            <li class="nav-item mt-2">
                                <a class="nav-link text-dark" href="{{route('initiatives')}}" data-href="#section-init">المبادرات</a>
                            </li>
                        @endif
                        @if(Auth::check())
                            <li class="nav-item mt-2">
                                <a class="nav-link text-dark" href="{{route('myProfile')}}" data-href="#section-init">حسابي</a>
                            </li>
                        @endif
                        @if (\Request::is('/'))
                            <li class="nav-item mt-2">
                                <a class="nav-link text-dark" href="#" data-href="#section-about">من نحن</a>
                            </li>
                        @endif
                        <li class="nav-item mt-2">
                            <a class="nav-link text-dark" href="/" data-href="#section-main">الرئيسية</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        @if (Route::currentRouteName() == "home")
            <main>
        @else
            <main class="py-4">
        @endif
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    @yield('scripts')
</body>
</html>
