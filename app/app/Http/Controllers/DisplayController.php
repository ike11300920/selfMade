<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        return view('mein');
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
}
