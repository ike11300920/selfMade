<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ガジェコン') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('stylesheet')
    @vite(['resources/js/app.js'])
</head>

    <body @yield('background')>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a id="title" class="navbar-brand" href="/">gadgetcon</a>

                <!--<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                    <img class="img-profile rounded-circle"src="img/undraw_profile.svg">
                </a>-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if(Auth::check())
                        <a href="{{ route('mypage') }}" class="nav-link text-white fs-5">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">< {{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('storage/S__151216133.jpg')}}">
                        </a>
                        /
                        <a href="#" id="logout" class="mt-navbar-item btn btn-outline-warning">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <script>
                            document.getElementById('logout').addEventListener('click', function(event) {
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            });
                        </script>
                        @else
                        <a class="my-navbar-item btn btn-outline-warning" href="{{ route('login') }}">ログイン</a>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @yield('content')
</body>
</html>