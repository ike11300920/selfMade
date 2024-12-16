@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/forum_create.css') }}" rel="stylesheet">

@endsection

@section('background')
class="bg-dark"
@endsection

@section('content')

<video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
    <main>
        <div class="col-md-7 mx-auto">
            <div class="card bg-dark bg-opacity-50">
                <div class="card-header">
                    <h4 class='text-center text-white'>フォーラム編集
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
                        <form action="{{ route('forum.edit', ['forum' => $forum['id']]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for='comment' class='mt-2 text-white'>タイトル</label>
                            <input class='form-control' name='title' value="{{$forum['title']}}">{{ old('title') }}</textarea>
                            
                            <label for='comment' class='mt-2 text-white'>協議内容</label>
                            <textarea class='form-control fs-5' name='discussion'>{{$forum['discussion']}}</textarea>

                            <label for='comment' class='mt-2 text-white'>画像</label>
                            <!-- プレビュー表示用のdivタグ -->
                            <div id="preview"></div>
                            <!-- ファイルインプットタグ -->
                            <input type="file" class='form-control' name="image" data-target-id="preview" data-classes="hoge fuga" onchange="previewer.setImgPreview(event);">
                            
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3' name="submit1">登録</button>
                            </div>

                            <!-- 投稿削除ボタン -->

                            <div id="comment" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#myModal" href="#">
                                <div class="card-body">投稿削除</div>
                            </div>

                            <!-- モーダル内 -->
                            <div id="app" class="container">
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">投稿を削除しますか？</h5>
                                            </div>
                                            <form action="{{ route('forum.edit', ['forum' => $forum['id']]) }}" method="post">
                                            @csrf

                                                <button type='submit' class="btn btn-outline-primary" name="submit2">削除</button>
                                                <a class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/forum_create.js') }}"></script>
    <script>
        // インスタンス化
        const previewer = new ImgPreviewer();
    </script>
@endsection