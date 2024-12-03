@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('background')
background="{{ asset('storage/samsung-samsung-.jpg')}}"
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
