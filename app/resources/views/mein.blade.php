@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/mein.css') }}" rel="stylesheet">
<script src="{{ asset('js/mein.js') }}" defer></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('background')
class="bg-dark"
@endsection

@section('content')
        <header class="masthead bg-dark">
                <video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
                
                <div class="bbs2">
                  <ul>
                    <li><div id="message" class="text-warning"></div></li>
                  </ul>
                </div>
                <div id="{{Auth::id()}}" class="hidden pusher"></div>

                <a href="/">
                    <img id="logo" src="{{ asset('storage/ガジェコン__3_-removebg-preview.png')}}"class="mx-auto d-block align-middle" />
                </a>

                <a href="{{ route('forums.create') }}" id="add-forum" class="btn btn-dark-moon text-white">
                    <span class="badge badge-pill badge-secondary text-warning">New</span>
                    <span class="badge badge-pill badge-secondary text-white" id="newForum">>新規フォーラム開設</span>
                </a>    

        </header>

        <form class="mx-auto" id="search">
            <div class="input-group">
                <input class="form-control" name="search" type="text" placeholder="キーワードを入力" aria-label="Search for..." aria-describedby="btnNavbarSearch"  value="{{ $search }}"/>
                <a href="{{route('/')}}">
                <button class="btn btn-warning" id="btnNavbarSearch" type="submit"><i class="fas fa-search">検索</i></button>
                </a>
            </div>
        </form>

                <ul class="nav nav-tabs bottom-0 justify-content-center nav-pills bg-dark" id="myTab" role="tablists">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">新着フォーラム</a>
                    </li>
                      <a class="nav-link" data-bs-toggle="tab" data-bs-target="#interest" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">気になるリスト</a>
                    </li>

                    <li class="nav-item" role="presentation">
                      <a class="nav-link" data-bs-toggle="tab" data-bs-target="#myForum" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">開設フォーラム</a>
                    </li>

                    <li class="nav-item" role="presentation">
                      <a class="nav-link" data-bs-toggle="tab" data-bs-target="#entryForum" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">参加フォーラム</a>
                    </li>
                </ul>

<!-- Section-->
<section class="py-5 bg-dark">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="tab-content">

      <!-- 新着表示 -->
      <div class="tab-pane active" id="home">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          
          @foreach ($forums as $forum)

          <div class="col mb-5">
            <div class="card h-100">

              <!-- 通知 -->
              <!--<span id="comment" class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
              </span>-->

              <!-- お気に入り -->
              @if (!$forum->isLikedBy(Auth::user()))
                <input id="interestBtn" class="form-check-input position-absolute" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $forum['id'] }})">
              @else
                <input id="interestBtn" class="form-check-input position-absolute active" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $forum['id'] }})" checked>
              @endif

              <!--<div class="btn btn-outline-warning position-absolute" style="top: 0.5rem; right: 0.5rem; height: 2.2rem;">★</div>-->
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

                <!-- 投稿主 -->
                @foreach ($users as $user)
                  @if($forum['user_id']==$user['id'])

                  <a href="{{ route('mypage', ['user' => $user['id']]) }}">
                  <div class="text-dark fs-5">
                    @if( $user['image'] ==null)
                      <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                    @else
                      <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . $user['image'] ) }}" alt="...">
                    @endif
                  
                    >{{ $user['name'] }}
                  </div>
                  </a> 

                    @else
                    @endif
                @endforeach

              </div>

              <!-- フォーラム詳細ボタン-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-outline-dark mt-auto" href="{{ route('forum.detail', ['forum' => $forum['id']]) }}">詳細</a>
                </div>
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

      <!-- 気になる一覧 -->
      <div class="tab-pane" id="interest">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          
          @foreach ($myInterests as $myInterest)

          <div class="col mb-5">
              <div class="card h-100">

                <!-- お気に入り -->
                @if (!$myInterest->isLikedBy(Auth::user()))
                  <input id="interestBtn" class="form-check-input position-absolute" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $myInterest['id'] }})">
                @else
                  <input id="interestBtn" class="form-check-input position-absolute active" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $myInterest['id'] }})" checked>
                @endif

                <!--<div class="btn btn-outline-warning position-absolute" style="top: 0.5rem; right: 0.5rem; height: 2.2rem;">★</div>-->
                <!-- Product image-->
                @if($myInterest['image']==null)
                  <img class="card-img-top" src="{{ asset('storage/1000_F_499933117_ZAUBfv3P1HEOsZDrnkbNCt4jc3AodArl.jpg')}}" alt="..." />
                @else
                  <img class="card-img-top" src="{{ asset( 'storage/' . $myInterest['image']) }}" alt="..." />
                @endif

                <!-- Product details-->
                <div class="card-body p-4">
                  <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder text-truncate">{{ $myInterest['title'] }}</h5>
                    <!-- Product price-->
                    <p id="mien-text">{{ $myInterest['discussion'] }}</p>
                  </div>

                  <!-- 投稿主 -->
                  @foreach ($users as $user)
                  @if($myInterest['user_id']==$user['id'])

                  <div class="text-dark">
                    @if( $user['image'] ==null)
                      <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                    @else
                      <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . $user['image'] ) }}" alt="...">
                    @endif

                    >{{ $user['name'] }}
                  </div>
                          
                  @else
                  @endif
                  @endforeach

                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                  <div class="text-center">
                    <a class="btn btn-outline-dark mt-auto" href="{{ route('forum.detail', ['forum' => $myInterest['id']]) }}">詳細</a>
                  </div>
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


      <!-- 開設フォーラム一覧 -->
      <div class="tab-pane" id="myForum">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          
          @foreach ($forums as $forum)
          @if(Auth::id()==$forum['user_id'])
          <div class="col mb-5">
            <div class="card h-100">
              <!-- お気に入り-->
              @if (!$forum->isLikedBy(Auth::user()))
                <input id="interestBtn" class="form-check-input position-absolute" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $forum['id'] }})">
              @else
                <input id="interestBtn" class="form-check-input position-absolute active" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $forum['id'] }})" checked>
              @endif
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

                <!-- 投稿主 -->
                @foreach ($users as $user)
                @if($forum['user_id']==$user['id'])

                <div class="text-dark">
                  @if( $user['image'] ==null)
                    <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                  @else
                    <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . $user['image'] ) }}" alt="...">
                  @endif

                  >{{ $user['name'] }}
                </div>
                          
                @else
                @endif
                @endforeach

              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-outline-dark mt-auto" href="{{ route('forum.detail', ['forum' => $forum['id']]) }}">詳細</a>
                </div>
              </div>
            </div>
          </div>
          @endif
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


      <!-- 参加フォーラム一覧 -->
      <div class="tab-pane" id="entryForum">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          
          @foreach ($entry as $ent)
          <div class="col mb-5">
            <div class="card h-100">
              <!-- Sale badge-->
              @if (!$ent->isLikedBy(Auth::user()))
                <input id="interestBtn" class="form-check-input position-absolute" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $ent['id'] }})">
              @else
                <input id="interestBtn" class="form-check-input position-absolute active" type="checkbox" style="top: 0.5rem; right: 0.5rem; height: 2.2rem; width: 2.2rem;" onclick="like({{ $ent['id'] }})" checked>
              @endif
              <!-- Product image-->
              @if($ent['image']==null)
                <img class="card-img-top" src="{{ asset('storage/1000_F_499933117_ZAUBfv3P1HEOsZDrnkbNCt4jc3AodArl.jpg')}}" alt="..." />
              @else
                <img class="card-img-top" src="{{ asset( 'storage/' . $ent['image']) }}" alt="..." />
              @endif
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder text-truncate">{{ $ent['title'] }}</h5>
                  <!-- Product price-->
                  <p id="mien-text">{{ $ent['discussion'] }}</p>
                </div>

                <!-- 投稿主 -->
                @foreach ($users as $user)
                @if($ent['user_id']==$user['id'])

                <div class="text-dark">
                  @if( $user['image'] ==null)
                    <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                  @else
                    <img id="forumIcon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . $user['image'] ) }}" alt="...">
                  @endif

                  >{{ $user['name'] }}
                </div>
                          
                @else
                @endif
                @endforeach

              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-outline-dark mt-auto" href="{{ route('forum.detail', ['forum' => $ent['id']]) }}">詳細</a>
                </div>
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


    </div>
  </div>
</section>





<div class="bbs">
    <ul>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
    </ul>
    <ul>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
      <li><img src="{{ asset('storage/gadgetcon7.png')}}"/></li>
    </ul>
  </div>
@endsection

