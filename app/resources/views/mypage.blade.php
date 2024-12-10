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
                            <div class="row gx-4 gx-lg-5 align-items-center my-5">

                                <div class="col-lg-7" id="forum-img">
                                
                                    @if( Auth::user()->image ==null)
                                        <img id="icon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                                    @else
                                        <img id="icon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . Auth::user()->image ) }}" alt="...">
                                    @endif

                                </div>

                                <div class="col-lg-5">
                                    <h1 class="font-weight-light text-white" id="name">{{ $profile['name'] }}</h1>
                                    <p class="text-white">職業：{{ $profile['job'] }}</p>
                                    <p class="text-white">自己紹介：{{ $profile['introduction'] }}</p>
                                    <div id="interest" class="btn btn-outline-warning">★
                                    </div>
                                    <a id="edit" class="btn btn-outline-primary" href="{{ route('mypage.setting') }}">編集ページへ</a>
                                </div>

                            </div>
                            <!-- Call to Action-->
                            <div id="comment" class="card text-white bg-secondary my-5 py-4 text-center btn btn-light fs-5">
                                <div class="card-body">使用デバイス</div>
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
@endsection