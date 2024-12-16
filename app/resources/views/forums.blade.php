@extends('layouts.layout')

@section('stylesheet')
<!-- Styles -->
<link href="{{ asset('css/forums.css') }}" rel="stylesheet">
@endsection

@section('background')
class="bg-dark"
@endsection

@section('content')

<video id="device" src="{{ asset('storage/33093-395456662_small.mp4')}}" loop="" autoplay="" muted=""  width="100%" class="bgv"></video>
                    <main>
                        <!-- Page Content-->
                        <div class="container px-4 px-lg-5" id="content">
                            <!-- Heading Row-->
                            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                                <div class="col-lg-7" id="forum-img">
                                    @if($forum['image']==null)
                                        <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('storage/1000_F_499933117_ZAUBfv3P1HEOsZDrnkbNCt4jc3AodArl.jpg')}}" alt="..." /></div>
                                    @else
                                        <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset( 'storage/' . $forum['image']) }}" alt="..." /></div>
                                    @endif
                                <div class="col-lg-5">
                                    <h1 class="font-weight-light text-white">{{ $forum->title }}</h1>
                                    <div id="discussion"><p class="text-white overflow-y-auto">{{ $forum->discussion }}</p></div>

                                    <!--<div id="interest" class="btn btn-outline-warning">★気になる</div>-->

                                    @if(Auth::id()==$forum['user_id'])
                                    <a id="edit" class="btn btn-outline-primary" href="{{ route('forum.edit', ['forum' => $forum['id']]) }}">編集ページへ</a>
                                    @endif

                                </div>
                            </div>
                            <!-- Call to Action-->
                            <div id="comment" class="card text-white bg-primary my-5 py-4 text-center btn btn-light fs-5" data-bs-toggle="modal" data-bs-target="#myModal" href="#">
                                <div class="card-body">コメントを返信</div>
                            </div>

                            <!-- モーダル内 -->
                            <div id="app" class="container">
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">コメントを返信</h5>
                                            </div>
                                            <form action="{{ route('comment',['forum' => $forum['id']]) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                                <p>コメント</p>
                                                <textarea class='form-control' name='comment'></textarea>
                                            
                                                <button type='submit' class="btn btn-outline-primary">追加</button>
                                                <a class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 返信コメント -->
                                @foreach ($comments as $comment)
                                    
                                <div class="col-md-4 mb-5 w-100">
                                    
                                    @if($comment['parent_comment_id']==null)

                                    <div class="card h-100">
                                        <div class="card-body">

                                            <h2 class="card-title fs-5">

                                            <!-- 投稿主 -->
                                              @foreach ($users as $user)
                                                @if($comment['user_id']==$user['id'])
                      
                                                <div class="text-warning">
                                                  @if( $user['image'] ==null)
                                                      <img id="commentIcon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                                                  @else
                                                      <img id="commentIcon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . $user['image'] ) }}" alt="...">
                                                  @endif
                      
                                                  >{{ $user['name'] }}
                                                </div>
                                                
                                                @else
                                                @endif
                                              @endforeach
                                                
                                            </h2>
                                            <p class="card-text">{{ $comment['comment'] }}</p>

                                        </div>
                                        <div class="card-footer"><a class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#{{ $comment['id'] }}" href="#">返信する</a></div>
                                    </div>

                                    <!-- モーダル内 -->
                                    <div id="app" class="container">
                                        <div id="{{ $comment['id'] }}" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">返信</h5>
                                                    </div>
                                                    <form action="{{ route('comment',['forum' => $forum['id']]) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
        
                                                        <p>コメント</p>
                                                        <textarea class='form-control' name='comment'></textarea>
                                                        <input type="hidden" class='form-control' name='comment_id' value="{{ $comment['id'] }}"></input>
                                                    
                                                        <button type='submit' class="btn btn-outline-primary">追加</button>
                                                        <a class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</a>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- 返信リプライ -->
                                    @foreach ($comments as $child)
                                    @if($comment['id']==$child['parent_comment_id'])
                                    <div class="card h-75 w-75 mr-0">
                                        <div class="card-body">
                                            <h2 class="card-title fs-5">↪
                                                
                                                <!-- 投稿主 -->
                                              @foreach ($users as $user)
                                              @if($child['user_id']==$user['id'])
                    
                                              <div class="text-warning">
                                                @if( $user['image'] ==null)
                                                    <img id="commentIcon" class="img-profile rounded-circle" src="{{ asset('storage/kkrn_icon_user_4.png')}}" alt="..." />
                                                @else
                                                    <img id="commentIcon" class="img-profile rounded-circle" src="{{ asset( 'storage/' . $user['image'] ) }}" alt="...">
                                                @endif
                    
                                                >{{ $user['name'] }}
                                              </div>
                                              
                                              @else
                                              @endif
                                              @endforeach
                            
                                            </h2>
                                            <p class="card-text">{{ $child['comment'] }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach

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