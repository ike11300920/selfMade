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
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container" id="navnav">
                <a id="title" class="navbar-brand" href="/"><img id="title-img" src="{{ asset('storage/gadgetcon10-removebg-preview.png')}}"/></a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if(Auth::check())
                        
                        
                        <a id="user-name" class="text-warning d-flex align-items-center fs-5" href="{{ route('mypage', ['user' =>Auth::id()]) }}">> {{ Auth::user()->name }}</a>
                        
                       
                        @if( Auth::user()->image ==null)
                            <img id="icon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                        @else
                            <img id="icon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . Auth::user()->image ) }}" alt="...">
                        @endif

                        <div class="vr"></div>

                        <a href="#" id="logout" class="mt-navbar-item btn btn-outline-secondary">ログアウト</a>
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

<footer class="py-5 bg-warning">
    <div class="container"><p class="m-0 text-center text-dark">Copyright &copy; Gadgetcon 2024</p></div>
</footer>

</html>