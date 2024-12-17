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

                                @foreach ($profiles as $profile)
                                <div class="col-lg-7" id="forum-img">
                                    
                                    @if( $profile['image'] ==null)
                                        <img id="icon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                                    @else
                                        <img id="icon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . $profile['image'] ) }}" alt="...">
                                    @endif

                                </div>

                                <div class="col-lg-5">
                                    <h1 class="font-weight-light text-white" id="name">{{ $profile['name'] }}</h1>
                                    <p class="text-white">職業：{{ $profile['job'] }}</p>
                                    <p class="text-white">自己紹介：{{ $profile['introduction'] }}</p>
                                    <div id="interest" class="btn btn-outline-warning">★
                                    </div>

                                    @if(Auth::id()==$profile['id'])
                                    <a id="edit" class="btn btn-outline-primary" href="{{ route('mypage.setting') }}">編集ページへ</a>
                                    @endif

                                </div>
                                @endforeach
                            </div>
                            <!-- Call to Action-->
                            <div class="text-center">
                                <h2 class="section-heading text-uppercase text-white" id="deviceTitle">DEVICES</h2>
                            </div>
                            <!-- Content Row-->
                            
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