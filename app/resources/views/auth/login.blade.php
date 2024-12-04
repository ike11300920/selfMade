@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('background')
class="overflow-hidden"
@endsection

@section('content')

<video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
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
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col p-2"><input type="email" id="email" class="form-control" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>
                        <div class="col p-2"><input type="password" id="password" name="password" class="form-control" placeholder="パスワード" required=""></div>
                        <a class="text-white" href="{{ route('password.request') }}">→パスワードを忘れた方はこちら</a>
                        <div class="row">
                            <div class="col p-3"><button class="btn btn-outline-warning btn-block" type="submit">ログイン</button></div>
                            <div class="col p-3"><a class="btn btn-warning btn-block" href="{{ route('register') }}">新規登録</a></div>
                        </div> 
                    </form>
                </div> 
            </div>
        </div>
    </div>
</main>


@endsection
