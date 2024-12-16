@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/signup.css') }}" rel="stylesheet">
<script src="{{ asset('js/uuu.js') }}" defer></script>
@endsection

@section('background')
class="overflow-hidden"
@endsection

@section('content')

<video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
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
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST">
                        @csrf
                            <div class="col p-2"><input type="name" id="formName" name="name" value="{{ old('name') }}" class="form-control" placeholder="ユーザー名" required="" autofocus=""></div>
                            <div class="col p-2"><input type="email" id="formEmail" name="email" value="{{ old('email') }}" class="form-control" placeholder="メールアドレス" required=""></div>
                            <div class="col p-2"><input type="password" id="formPassword" name="password" class="form-control" placeholder="パスワード" required=""></div>
                            <div class="col p-2"><input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="パスワード再確認" required=""></div>

                            <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">登録</button></div>
                        </form>
                    </div> 
                </div> 
            </div>
        </div>
    </main>

@endsection
