<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//默认首页
Route::get('/', function () {
    return view('home.index.default');
});


//问题页
Route::get('/question', function () {
    return view('home.question.default');
});

//登陆
Route::get('login', function () {
    return view('home.session.login');
})->name('login');

//注册
Route::get('register', function () {
    return view('home.session.register');
})->name('register');


Route::get('user', function () {
    return view('home.user.userinfo');
});