@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/forum_create.css') }}" rel="stylesheet">
<script src="{{ asset('js/forum_create.js') }}" defer></script>
@endsection

@section('background')
class="overflow-hidden"
@endsection

@section('content')

<video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
    <main>
        <div class="col-md-7 mx-auto">
            <div class="card bg-dark">
                <div class="card-header">
                    <h4 class='text-center text-white'>新規フォーラム開設
                    </h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="panel-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                <li>{{$message}}</li>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <form action="{{ route('forums.create') }}" method="post">
                            @csrf
                            <label for='comment' class='mt-2 text-white'>タイトル</label>
                            <input class='form-control' name='title'>{{ old('comment') }}</textarea>
                            
                            <label for='comment' class='mt-2 text-white'>協議内容</label>
                            <textarea class='form-control' name='discussion'>{{ old('comment') }}</textarea>

                            <label for='comment' class='mt-2 text-white'>画像</label>
                            <div class="imagePreview"></div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        ファイルを選択<input type="file" style="display:none" class="uploadFile">
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly="" name='image'>
                            </div>
                            
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection