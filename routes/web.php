<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('posts');
});
Route::get('/posts', function () {
    return view('posts');
});
Route::get('/createpost', function () {
    return view('createpost');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/wallet', function () {
    return view('wallet');
});
Route::get('/productdetail', function () {
    return view('productdetail');
});
Route::get('/publicprofile', function () {
    return view('publicprofile');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/codeverify', function () {
    return view('codeauth');
});
Route::get('/forgetpassword', function () {
    return view('forgetpassword');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
