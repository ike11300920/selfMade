<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ガジェコン') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/uuu.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>
    <body background="{{ asset('storage/samsung-memory-rMSYJWOIgMw-unsplash.jpg')}}" >
    <div class="container-fluid" >
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                   
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars ms-1"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ms-auto py-5 py-lg-0">
                            <li class="nav-item"><a class="nav-link text-white" href="#Sign in">Sign in</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="#Sign out">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-5">
                <div class="row justify-content-around my-5">
                    <div class="col-md-4">
                        <div>
                            <img src="{{ asset('storage/ガジェコン__3_-removebg-preview.png')}}" />
                        </div>
                    </div>
                    <div class="col-md-4 text-center row align-items-center" cz-shortcut-listen="true">
                        <div class="card bg-dark">
                            <div class="card-header">
                                <h1 class="h3 mb-3 font-weight-normal text-white p-3">Sign in</h1>
                            </div>      
                            <div class="card-body">
                                <div class="col p-2"><input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus=""></div>
                                <div class="col p-2"><input type="password" id="inputPassword" class="form-control" placeholder="Password" required=""></div>
                                <div class="row">
                                    <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">Sign in</button></div>
                                    <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">Sign up</button></div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>