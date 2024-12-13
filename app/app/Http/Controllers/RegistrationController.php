<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Forum;
use App\Models\Device;
use App\Models\Comment;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Events\MyEvent;

class RegistrationController extends Controller
{
    public function forumsCreate(Request $request)
    {
        $forum = new Forum;
        $id = Auth::id();

        $image = $request->file('image');
        // dd($image);
        // 画像がアップロードされていれば、storageに保存
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
            $forum->image = $path[1];
        } else {
            $path = null;
        }

        $forum->title = $request->title;
        $forum->discussion = $request->discussion;
        $forum->user_id = $id;

        $forum->save();

        return redirect('/');
    }
    public function forumEdit(Forum $forum, Request $request)
    {
        $image = $request->file('image');
        //ddd($forum);
        // 画像がアップロードされていれば、storageに保存
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
            $forum->image = $path[1];
        } else {
            //$path = null;
        }

        $forum->title = $request->title;
        $forum->discussion = $request->discussion;

        $forum->save();

        return redirect('/');
    }
    public function mypageSetting(Request $request)
    {
        $user = Auth::user();

        if (isset($_POST['submit1'])) {
            $image = $request->file('image');
            // dd($image);
            // 画像がアップロードされていれば、storageに保存
            if ($request->hasFile('image')) {
                $path = \Storage::put('/public', $image);
                $path = explode('/', $path);
                $user->image = $path[1];
            } else {
                $path = null;
            }

            $user->name = $request->name;
            $user->job = $request->job;
            $user->introduction = $request->introduction;

            $user->save();

            return redirect('/mypage');
        } elseif (isset($_POST['submit2'])) {

            $device = new Device;

            $device->name = $request->name;
            $device->url = $request->url;

            $device->save();

            return redirect('/mypage/setting');
        }
    }
    public function forumDetailComment(Forum $forum, Request $request)
    {
        $comment = new Comment;
        $id = Auth::id();
        $forum_id = $forum->id;

        $comment->comment = $request->comment;
        $comment->user_id = $id;
        $comment->forum_id =  $forum_id;
        $comment->parent_comment_id = $request->comment_id;
        //ddd($request->comment_id);
        $comment->save();

        broadcast(new \App\Events\MyEvent());
        Comment::getEventDispatcher()->dispatch('comments');

        return back();
    }


    public function store($postId)
    {

        $interest = new Interest;

        //既に「いいね」しているか判定
        $judge = $interest->where('interests.user_id', '=', Auth::id())
            ->where('interests.forum_id', '=', $postId)
            ->exists();

        if ($judge == true) {
            //もし既に「いいね」していたら削除
            $interest->where('interests.user_id', '=', Auth::id())
                ->where('interests.forum_id', '=', $postId)
                ->delete();
        } else {
            //まだ「いいね」していなかったら登録
            $interest->forum_id = $postId;
            $interest->user_id = Auth::id();
            $interest->save();
        }

        return 'ok!'; //レスポンス内容
    }
}
