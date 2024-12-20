<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\Comment;
use App\Models\Interest;
use App\Models\User;

class DisplayController extends Controller
{
    public function index(Request $request)
    {
        $forum = new Forum;
        $user = new User;

        $users = $user->get();

        //新着フォーラム
        $forums = $forum->latest('updated_at')->paginate(8);
        //ddd($forum);

        //参加済みフォーラム
        $entry = $forum->join('comments', 'forums.id', 'comments.forum_id')
            ->whereNotNull('comments.forum_id')
            ->where('comments.user_id', '=', Auth::id())
            ->select('forums.user_id', 'comments.forum_id', 'forums.id', 'forums.title', 'forums.image', 'forums.discussion', 'forums.created_at', 'forums.updated_at')
            ->groupBy('comments.forum_id')
            ->paginate(8);
        //dd($entry);

        //お気に入りリスト
        $interest = new Interest;

        $myInterest = $forum->join('interests', 'forums.id', 'interests.forum_id')
            ->where('interests.user_id', '=', Auth::id())
            ->select('forums.user_id', 'forums.id', 'forums.title', 'forums.image', 'forums.discussion', 'forums.created_at', 'forums.updated_at')
            ->paginate(8);
        //dd($myInterest);

        //検索結果一覧
        $search = $request->input('search');

        $searchResult = $forum->where('title', 'like', "%{$search}%")
            ->orwhere('discussion', 'LIKE', "%{$search}%")
            ->latest('updated_at')
            ->paginate(8);
        //ddd($searchResult);

        //$forum = $forum->id->get();
        //ddd($forum);

        //既に「いいね」しているか判定
        //$judge = $interest->where('user_id', '=', Auth::id())
        //    ->where('forum_id', '=', 'forum.id')
        //    ->get();
        //ddd($judge);
        //ddd($users);
        return view('mein', ['forums' => $searchResult, 'entry' => $entry, 'myInterests' => $myInterest, 'search' => $search, 'users' => $users, 'key' => env('PUSHER_APP_KEY'), 'cluster' => env('PUSHER_APP_CLUSTER')]);
    }
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }
    public function signupConfirm()
    {
        return view('signup_confirm');
    }
    public function pwdRstInfo()
    {
        return view('password_reset_information');
    }
    public function pwdRst()
    {
        return view('password_reset');
    }
    public function pwdRstDone()
    {
        return view('password_reset_done');
    }
    public function mypage($user)
    {
        $id = $user;
        $all_user = new User;
        $profile = $all_user->where('id', '=', $id)->get();
        //$profile = Auth::user();
        //ddd($profile);

        $all_device = new Device;
        $device = $all_device->where('user_id', '=', $id)->get()->toArray();
        return view('mypage', ['profiles' => $profile, 'devices' => $device,]);
    }
    public function mypageSettingForm()
    {
        $profile = Auth::user();
        //ddd($profile);
        $id = Auth::id();

        $all_device = new Device;
        $device = $all_device->where('user_id', '=', $id)->get()->toArray();
        //ddd($device);
        return view('mypage_setting', ['profile' => $profile, 'devices' => $device,]);
    }
    public function forumsCreateForm()
    {
        return view('forums_create');
    }
    public function forumDetail(Forum $forum)
    {
        $user = new User;

        $users = $user->get();

        $all_comment = new Comment;
        $comment = $all_comment->where('comments.forum_id', '=', $forum['id'])->get();
        //ddd($comment);
        return view('forums', ['forum' => $forum, 'comments' => $comment, 'users' => $users]);
    }
    public function forumEditForm(Forum $forum)
    {
        return view('forum_edit', ['forum' => $forum,]);
    }
}
