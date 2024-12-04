@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('background')
class="overflow-hidden"
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="py-5">
    <div class="row justify-content-around my-5">
        <div class="col-md-4 d-flex align-items-center justify-content-center">
            <div>
                <img src="{{ asset('storage/ガジェコン__3_-removebg-preview.png')}}" />
            </div>
        </div>
        <div class="col-md-4 text-center row align-items-center">
            <div class="card bg-dark">
                <div class="card-header">
                    <h1 class="h3 mb-3 font-weight-normal text-white p-3">パスワード再設定</h1>
                </div>      
                <div class="card-body">
                    <form action="{{ route('password.update')}}" method="post">
                        @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col p-2"><input type="email" id="inputEmail" class="form-control" placeholder="メールアドレスを入力" required="" autofocus=""></div>
                        <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">メールを送信</button></div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</main>
</div>
</div>

@endsection
