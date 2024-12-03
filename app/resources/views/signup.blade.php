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
                                <h1 class="h3 mb-3 font-weight-normal text-white p-3">新規登録
                                </h1>
                            </div>      
                            <div class="card-body">
                                <form action="{{ route('signup.confirm')}}" method="post">
                                    @csrf
                                    <div class="col p-2"><input type="name" id="inputEmail" class="form-control" placeholder="ユーザー名" required="" autofocus=""></div>
                                    <div class="col p-2"><input type="email" id="inputPassword" class="form-control" placeholder="メールアドレス" required=""></div>
                                    <div class="col p-2"><input type="password" id="inputPassword" class="form-control" placeholder="パスワード" required=""></div>
                                    <div class="col p-2"><input type="password" id="inputPassword" class="form-control" placeholder="パスワード再確認" required=""></div>
                                    <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">確認へ</button></div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection