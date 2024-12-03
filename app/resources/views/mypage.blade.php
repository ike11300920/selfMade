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
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">gadgetcon</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="masthead">
                <img id="device" src="{{ asset('storage/samsung-memory-rMSYJWOIgMw-unsplash.jpg')}}" class="" alt="">
                <img id="logo" src="{{ asset('storage/ガジェコン__3_-removebg-preview.png')}}"class="w-25 mx-auto d-block" />
        </header>
        
        <mein>
            <div class="bg-dark">
                <div class="container mt-5 mb-0 p-5 d-flex justify-content-center bg-dark"> 
                    <div class="card p-4 w-100 bg-dark text-white fs-4"> 
                        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                            <button class="btn btn-secondary"> 
                                <img src="{{ asset('storage/S__151216133.jpg')}}" height="300" width="300"/>
                            </button> 
                            <span class="name mt-3">池本知茉</span> 
                            <span class="idd">@ikemoto</span> 
                            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                                <span class="idd1">職業：ああああ。 
                                    <span><i class="fa fa-copy"></i></span>
                                </span>
                            </div> 
                            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                                <span class="number">自己紹介： 
                                    <span class="follow">あああああああ。
                                    </span>
                                </span> 
                            </div> 
                            <div class=" d-flex mt-2"> 
                                <button class="btn1 btn-dark">Edit Profile</button> 
                            </div> 
                            <div class="text mt-3"> 
                                <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> 
                            </div> 
                            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                                <span><i class="fa fa-twitter"></i></span> 
                                <span><i class="fa fa-facebook-f"></i></span> 
                                <span><i class="fa fa-instagram"></i></span> 
                                <span><i class="fa fa-linkedin"></i></span> 
                            </div> 
                            <div class=" px-2 rounded mt-4 date "> 
                                <span class="join">Joined May,2021</span> 
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </mein>
    </body>