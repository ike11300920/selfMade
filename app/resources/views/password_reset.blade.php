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
                                <form action="{{ route('pwd.rst.done')}}" method="post">
                                @csrf
                                    <div class="col p-2"><input type="password" id="inputEmail" class="form-control" placeholder="新しいパスワードを入力" required="" autofocus=""></div>
                                    <div class="col p-2"><input type="password" id="inputPassword" class="form-control" placeholder="新しいパスワードを再入力" required=""></div>
                                    <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" type="submit">登録</button></div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection