@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection

@section('content')
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
@endsection