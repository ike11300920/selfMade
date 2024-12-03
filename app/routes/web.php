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

Route::get('/', [DisplayController::class, 'index']);
Route::get('/login', [DisplayController::class, 'login'])->name('login');
Route::get('/signup', [DisplayController::class, 'signup'])->name('signup');
Route::post('/signup/confirm', [DisplayController::class, 'signupConfirm'])->name('signup.confirm');
Route::get('/password/reset/information', [DisplayController::class, 'pwdRstInfo'])->name('pwd.rst.info');
Route::post('/password/reset', [DisplayController::class, 'pwdRst'])->name('pwd.rst');
Route::post('/password/reset/done', [DisplayController::class, 'pwdRstDone'])->name('pwd.rst.done');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {});
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
