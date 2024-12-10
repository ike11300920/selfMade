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
                                        <textarea class='form-control form-control-lg' name='introduction' value="{{$profile['introduction']}}"></textarea>

                                        <div id="interest" class="btn btn-outline-warning">★</div>
                                        <button type='submit' class="btn btn-outline-primary"name="submit1">編集登録</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Call to Action-->
                            <div id="comment" class="card text-white bg-secondary my-5 py-4 text-center btn btn-light fs-5" data-bs-toggle="modal" data-bs-target="#myModal" href="#">
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

                                                <p>デバイス名</p>
                                                <input class='form-control' name='name'></textarea>

                                                <p>商品URL</p>
                                                <textarea class='form-control' name='url'></textarea>
                                            
                                                <button type='submit' class="btn btn-outline-primary"name="submit2">デバイス登録</button>
                                            </form>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Row-->
                            
                            <div class="row gx-4 gx-lg-5">
                                @foreach ($devices as $device)
                                <div class="col-md-4 mb-5">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h2 class="card-title">{{ $device['name'] }}</h2>
                                            <p class="card-text">【商品URL:】{{ $device['url'] }}</p>
                                        </div>
                                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">削除</a></div>
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