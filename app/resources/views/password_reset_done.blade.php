@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('background')
background="{{ asset('storage/samsung-memory-rMSYJWOIgMw-unsplash.jpg')}}"
@endsection

@section('content')
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
                                <p class="text-white">パスワードの再設定が完了しました。<br><br>新しいパスワードでログインし、<br>引き続き「ガジェコン」をご活用ください。</p>
                                    <div class="col p-3"><a class="btn btn btn-warning btn-block" href="{{ route('login') }}">ログインページへ</a></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection