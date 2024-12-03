@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/signup.css') }}" rel="stylesheet">
<script src="{{ asset('js/uuu.js') }}" defer></script>
@endsection

@section('background')
background="{{ asset('storage/samsung-samsung-.jpg')}}"
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

                            <div class="col p-3"><button class="btn btn btn-outline-warning btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">確認へ</button></div>
                        
                        <!-- モーダルの設定 -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">入力内容の確認</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <div>
                                        <p class="text-muted">ユーザ名</p>
                                        <p class="px-2" id="modalName"></p>
                                    </div>
                                    <div>
                                        <p class="text-muted">メールアドレス</p>
                                        <p class="px-2" id="modalEmail"></p>
                                    </div>
                                    <div>
                                        <p class="text-muted">パスワード</p>
                                        <p class="px-2" id="modalPassword"></p>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <button type="button" class="btn btn-primary" type="submit">OK</button>
                                    </div><!-- /.modal-footer -->
                                </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        
                        </form>
                    </div> 
                </div> 
            </div>
        </div>
    </main>

@endsection
