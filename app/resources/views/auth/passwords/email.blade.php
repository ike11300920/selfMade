@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('background')
class="overflow-hidden"
@endsection

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

<video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <form action="{{ route('password.email')}}" method="post">
                        @csrf
                        <div class="col p-2"><input type="email" id="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力" required autocomplete="email" autofocus=""></div>
                        <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">メールを送信</button></div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                </div> 
            </div>
        </div>
    </div>
</main>
</div>
</div>

@endsection
