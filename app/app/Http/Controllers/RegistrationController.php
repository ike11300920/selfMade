<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Forum;

class RegistrationController extends Controller
{
    public function forumsCreate(Request $request)
    {
        $forum = new Forum;

        $columns = ['title', 'discussion', 'image'];
        foreach ($columns as $column) {
            $forum->$column = $request->$column;
        }

        Auth::user()->forum()->save($forum);

        return redirect('/');
    }
}
