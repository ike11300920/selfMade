@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/mein.css') }}" rel="stylesheet">
@endsection

@section('background')
class="bg-dark"
@endsection

@section('content')
        <header class="masthead bg-dark">
                <video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
                <a href="/">
                    <img id="logo" src="{{ asset('storage/ガジェコン__3_-removebg-preview.png')}}"class="w-25 mx-auto d-block align-middle" />
                </a>

                <a href="{{ route('forums.create') }}" id="add-forum" class="btn btn-orange-moon text-white">
                    <span class="badge badge-pill badge-secondary text-primary">New</span>
                    >新規フォーラム開設
                </a>            

        </header>

        <form class="w-25 mx-auto" id="search">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="フォーラムタイトル" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-warning" id="btnNavbarSearch" type="button"><i class="fas fa-search">検索</i></button>
            </div>
        </form>

                <ul class="nav nav-tabs bottom-0 justify-content-center nav-pills bg-dark" id="myTab" role="tablist">
                    <li class="nav-item bottom-0" role="presentation">
                    <button class="nav-link active bottom-0" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">新着フォーラム</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">気になるリスト</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">開設フォーラム</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">参加フォーラム</button>
                    </li>
                </ul>
              <div class="tab-content bg-dark" id="myTabContent">
                <div class="tab-pane fade text-dark show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">...</div>
                <div class="tab-pane fade text-dark" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade text-dark" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade text-dark" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
              </div>

<!-- Section-->
<section class="py-5 bg-dark">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach ($forums as $forum)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="btn btn-outline-warning position-absolute" style="top: 0.5rem; right: 0.5rem; height: 2.2rem;">★</div>
                    <!-- Product image-->
                    @if($forum['image']==null)
                        <img class="card-img-top" src="{{ asset('storage/1000_F_499933117_ZAUBfv3P1HEOsZDrnkbNCt4jc3AodArl.jpg')}}" alt="..." />
                    @else
                        <img class="card-img-top" src="{{ asset( 'storage/' . $forum['image']) }}" alt="..." />
                    @endif
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder text-truncate">{{ $forum['title'] }}</h5>
                            <!-- Product price-->
                            <p id="mien-text">{{ $forum['discussion'] }}</p>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">詳細</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

            <nav id="page" aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="http://localhost?page=1" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="http://localhost?page=1">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="http://localhost?page=2">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link"  href="http://localhost?page=3">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="http://localhost?page=3" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
    </div>
</section>
@endsection
