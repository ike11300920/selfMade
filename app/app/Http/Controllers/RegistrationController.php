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
        if (isset($_POST['submit1'])) {
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
        } elseif (isset($_POST['submit2'])) {
            $forum->delete();
        }
        return redirect('/');
    }
    public function mypageSetting(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
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

            return redirect(route('mypage', ['user' => $id]));
        } elseif (isset($_POST['submit2'])) {

            $device = new Device;

            $image = $request->file('image');
            // dd($image);
            // 画像がアップロードされていれば、storageに保存
            if ($request->hasFile('image')) {
                $path = \Storage::put('/public', $image);
                $path = explode('/', $path);
                $device->image = $path[1];
            } else {
                $path = null;
            }

            $id = Auth::id();

            $device->name = $request->name;
            $device->url = $request->url;
            $device->user_id = $id;

            $device->save();

            return redirect('/setting');
        }
    }
    public function deviceDelete(Device $device, Request $request)
    {
        $device->delete();
        return redirect('/mypage/setting');
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

        //コメントしたフォーラムをお気に入りしているユーザーをあぶりだし
        $all_forum = new Forum;
        $interestUsers = $all_forum->join('interests', 'forums.id', 'interests.forum_id')
            ->where('interests.forum_id', '=', $forum_id)
            ->select('interests.user_id')
            ->groupBy('interests.user_id')
            ->get()
            ->toArray();
        //dd($interestUsers);
        foreach ($interestUsers as $interestUser) {
            $user = $interestUser['user_id'];
            event(new MyEvent($user, '★「気になる」フォーラムにコメントがありました！！'));
        };


        //コメントしたフォーラムを作成したユーザーをあぶりだし
        $all_forum = new Forum;
        $createUsers = $all_forum
            ->where('forums.id', '=', $forum_id)
            ->select('forums.user_id')
            ->get()
            ->toArray();
        //dd($createUsers);
        foreach ($createUsers as $createUser) {
            $user = $createUser['user_id'];
            event(new MyEvent($user, '★「開設済み」のフォーラムにコメントがありました！！'));
        };

        //コメントしたフォーラムにコメントしているユーザーをあぶりだし
        $all_forum = new Forum;
        $addUsers = $all_forum->join('comments', 'forums.id', 'comments.forum_id')
            ->where('comments.forum_id', '=', $forum_id)
            ->select('comments.user_id')
            ->groupBy('comments.user_id')
            ->get()
            ->toArray();
        //dd($addUsers);
        foreach ($addUsers as $addUser) {
            $user = $addUser['user_id'];
            event(new MyEvent($user, '★「参加済み」のフォーラムにコメントがありました！！'));
        };

        $comment->save();

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
