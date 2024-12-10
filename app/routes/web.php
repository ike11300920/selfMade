<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {return view('home');});
//Auth::routes();

//メイン表示
Route::get('/', [DisplayController::class, 'index']);
//ログイン
Route::get('/login', [DisplayController::class, 'login'])->name('login');
//新規アカウント登録
Route::get('/signup', [DisplayController::class, 'signup'])->name('signup');
Route::post('/signup/confirm', [DisplayController::class, 'signupConfirm'])->name('signup.confirm');
//パスワードリセット
Route::get('/password/reset/information', [DisplayController::class, 'pwdRstInfo'])->name('pwd.rst.info');
Route::post('/password/reset', [DisplayController::class, 'pwdRst'])->name('pwd.rst');
Route::post('/password/reset/done', [DisplayController::class, 'pwdRstDone'])->name('pwd.rst.done');
//フォーラム詳細
Route::get('/forums/{forum}/detail', [DisplayController::class, 'forumDetail'])->name('forum.detail');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    //マイページ表示
    Route::get('/mypage', [DisplayController::class, 'mypage'])->name('mypage');
    //マイページ編集
    Route::get('/mypage/setting', [DisplayController::class, 'mypageSettingForm'])->name('mypage.setting');
    Route::post('/mypage/setting', [RegistrationController::class, 'mypageSetting']);

    //新規フォーラム作成
    Route::get('/forums/create', [DisplayController::class, 'forumsCreateForm'])->name('forums.create');
    Route::post('/forums/create', [RegistrationController::class, 'forumsCreate']);

    //フォーラム編集
    Route::get('/forums/edit/{forum}', [DisplayController::class, 'forumEditForm'])->name('forum.edit');
    Route::post('/forums/edit/{forum}', [RegistrationController::class, 'forumEdit']);

    //フォーラム詳細から返信コメント追加
    Route::post('/forums/{forum}/detail', [RegistrationController::class, 'forumDetailComment'])->name('comment');
});
