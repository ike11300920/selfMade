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
                <a class="navbar-brand" href="/">gadgetcon</a>

                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if(Auth::check())
                        <span class="my-navbar-item">{{ Auth::user()->name }}</span>
                        /
                        <a href="#" id="logout" class="mt-navbar-item">ログアウト</a>
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
                        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                        @endif
                    </ul>
                </div>
                

            </div>
        </nav>
    @yield('content')
</body>
</html>