@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/signup.css') }}" rel="stylesheet">
@endsection

@section('background')
background="{{ asset('storage/samsung-memory-rMSYJWOIgMw-unsplash.jpg')}}"
@endsection

@section('content')
            <main class="py-5">
                <div class="row justify-content-around my-5">
                    <div class="col-md-4 d-flex align-items-center justify-content-center" id="logo">
                            <a href="/">
                                <img src="{{ asset('storage/ガジェコン__3_-removebg-preview.png')}}" />
                            </a>
                    </div>
                    <div class="col-md-4 text-center row align-items-center" id="form">
                        <div class="card bg-dark">
                            <div class="card-header">
                                <h1 class="h3 mb-3 font-weight-normal text-white p-3">登録内容確認</h1>
                            </div>      
                            <div class="card-body">
                                <p class="text-white">ユーザ名：</p><p class="text-white"></p><br>
                                <p class="text-white">メールアドレス：</p><p class="text-white"></p><br>
                                <p class="text-white">パスワード：</p><p class="text-white"></p><br>
                                    <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">登録</button></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection