<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\Comment;

class DisplayController extends Controller
{
    public function index()
    {
        $forum = new Forum;
        $forum = $forum->latest('updated_at')->paginate(8);
        //ddd($forum);
        return view('mein', ['forums' => $forum,]);
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
        $comment = $all_comment->all()->toArray();
        //ddd($comment);
        return view('forums', ['forum' => $forum, 'comments' => $comment]);
    }
    public function forumEditForm(Forum $forum)
    {
        return view('forum_edit', ['forum' => $forum,]);
    }
}
