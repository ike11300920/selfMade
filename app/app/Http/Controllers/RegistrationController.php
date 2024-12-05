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
        $id = Auth::id();

        $data = $request->all();
        // dd($data);
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
}
