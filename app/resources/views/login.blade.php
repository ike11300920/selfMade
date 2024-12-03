@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('background')
background="{{ asset('storage/samsung-memory-rMSYJWOIgMw-unsplash.jpg')}}"
@endsection

@section('content')
            <main class="py-5" >
                <div class="row justify-content-around my-5">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <a href="/">
                            <img src="{{ asset('storage/ガジェコン__3_-removebg-preview.png')}}" />
                        </a>
                    </div>
                    <div class="col-md-4 text-center row align-items-center">
                        <div class="card bg-dark">
                            <div class="card-header">
                                <h1 class="h3 mb-3 font-weight-normal text-white p-3">ログイン
                                </h1>
                            </div>      
                            <div class="card-body">
                                <div class="col p-2"><input type="email" id="inputEmail" class="form-control" placeholder="メールアドレス" required="" autofocus=""></div>
                                <div class="col p-2"><input type="password" id="inputPassword" class="form-control" placeholder="パスワード" required=""></div>
                                <a class="text-white" href="{{ route('pwd.rst.info') }}">→パスワードを忘れた方はこちら</a>
                                <div class="row">
                                    <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">ログイン</button></div>
                                    <div class="col p-3"><a class="btn btn btn-warning btn-block" href="{{ route('signup') }}">新規登録</a></div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection