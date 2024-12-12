<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\Comment;
use App\Models\Interest;

class DisplayController extends Controller
{
    public function index()
    {
        $forum = new Forum;

        $interest = new Interest;

        $forums = $forum->latest('updated_at')->paginate(8);
        //ddd($forum);

        $entry = $forum->join('comments', 'forums.id', 'comments.forum_id')
            ->whereNotNull('comments.forum_id')
            ->where('comments.user_id', '=', Auth::id())
            ->select('comments.forum_id', 'forums.id', 'forums.title', 'forums.image', 'forums.discussion', 'forums.created_at', 'forums.updated_at')
            ->groupBy('comments.forum_id')
            ->get();

        //$forum = $forum->id->get();
        //ddd($forum);

        //既に「いいね」しているか判定
        //$judge = $interest->where('user_id', '=', Auth::id())
        //    ->where('forum_id', '=', 'forum.id')
        //    ->get();
        //ddd($judge);
        return view('mein', ['forums' => $forums, 'entry' => $entry]);
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
    public function mypage()
    {
        $profile = Auth::user();
        //ddd($profile);

        $all_device = new Device;
        $device = $all_device->all()->toArray();
        return view('mypage', ['profile' => $profile, 'devices' => $device,]);
    }
    public function mypageSettingForm()
    {
        $profile = Auth::user();
        //ddd($profile);

        $type = new Device;
        $device = $type->all()->toArray();
        //ddd($device);
        return view('mypage_setting', ['profile' => $profile, 'devices' => $device,]);
    }
    public function forumsCreateForm()
    {
        return view('forums_create');
    }
    public function forumDetail(Forum $forum)
    {
        $all_comment = new Comment;
        $comment = $all_comment->where('comments.forum_id', '=', $forum['id'])->get();
        //ddd($comment);
        return view('forums', ['forum' => $forum, 'comments' => $comment]);
    }
    public function forumEditForm(Forum $forum)
    {
        return view('forum_edit', ['forum' => $forum,]);
    }
}
