@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection

@section('background')
class="bg-dark"
@endsection

@section('content')

<video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
                    <main>
                        <!-- Page Content-->
                        <div class="container px-4 px-lg-5">
                            <!-- Heading Row-->
                            <form action="{{ route('mypage.setting') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                                    <div class="col-lg-7" id="forum-img">
                                        
                                        @if($profile['image']==null)
                                            <div class="card-img-top rounded-circle" id="preview" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." /></div>
                                        @else
                                            <div class="card-img-top rounded-circle" id="preview" src="{{ asset( 'storage/' . $profile['image']) }}" alt="..." /></div>
                                        @endif

                                        <input type="file" class='form-control w-50 img-setting' name="image" data-target-id="preview" data-classes="hoge fuga" onchange="previewer.setImgPreview(event);">
                                    </div>

                                    <div class="col-lg-5">
                                        <label for='comment' class='mt-2 text-white' id="user-name">ユーザ名</label>
                                        <input class='form-control' name='name' value="{{ $profile['name'] }}"></textarea>

                                        <label for='comment' class='mt-2 text-white'>職業</label>
                                        <input class='form-control' name='job' value="{{ $profile['job'] }}"></textarea>

                                        <label for='comment' class='mt-2 text-white'>自己紹介</label>
                                        <textarea class='form-control' name='introduction'>{{$profile['introduction']}}</textarea>

                                        <button type='submit' class="btn btn-outline-primary"name="submit1">編集登録</button>
                                    </div>
                                </div>
                            </form>

                            <!-- 新規使用デバイス追加-->
                            <div id="comment" class="card text-white bg-primary my-5 py-4 text-center btn btn-light fs-5" data-bs-toggle="modal" data-bs-target="#myModal" href="#">
                                <div class="card-body">使用デバイス追加</div>
                            </div>

                            <div id="app" class="container">
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">使用デバイス追加</h5>
                                            </div>
                                            <form action="{{ route('mypage.setting') }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                                <p>【画像】</p>
                                                <input type="file" class='form-control w-50 img-setting' name="image" data-target-id="preview" data-classes="hoge fuga" onchange="previewer.setImgPreview(event);">

                                                <p>【デバイス名】</p>
                                                <input class='form-control' name='name'></textarea>

                                                <p>【商品URL】</p>
                                                <textarea class='form-control' name='url'></textarea>
                                            
                                                <button type='submit' class="btn btn-outline-primary"name="submit2">デバイス登録</button>

                                                <a class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</a>
                                          
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 使用デバイス一覧-->
                            <div class="row gx-4 gx-lg-5">
                                @foreach ($devices as $device)
                                <div class="col-md-4 mb-5">
                                    <div class="card h-100">

                                        @if($device['image']==null)
                                            <img class="card-img-top" src="{{ asset('storage/1000_F_499933117_ZAUBfv3P1HEOsZDrnkbNCt4jc3AodArl.jpg')}}" alt="..." />
                                        @else
                                            <img class="card-img-top" src="{{ asset( 'storage/' . $device['image']) }}" alt="..." />
                                        @endif

                                        <div class="card-body">
                                            <h2 class="card-title">{{ $device['name'] }}</h2>
                                            <div id="url">
                                                <h3 class="card-text fs-5">【商品URL】</h3>
                                                <p class="card-text overflow-y-auto">{{ $device['url'] }}</p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $device['id'] }}" href="#!">削除</a>
                                        </div>

                                        <!-- モーダル内 -->
                                        <div id="app" class="container">
                                            <div id="{{ $device['id'] }}" class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">デバイス情報を削除しますか？</h5>
                                                        </div>
                                                        <form action="{{ route('device.delete', ['device' => $device['id']]) }}" method="post">
                                                        @csrf
                                        
                                                            <button type='submit' class="btn btn-outline-primary" name="submit3">削除</button>
                                                            <a class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</a>
                                        
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
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