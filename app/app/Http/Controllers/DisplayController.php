<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class DisplayController extends Controller
{
    public function index(Forum $forum)
    {
        $forum = new Forum;
        $forum = $forum->paginate(8);
        //dd($forum);
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
        return view('mypage');
    }
    public function forumsCreateForm()
    {
        return view('forums_create');
    }
}
