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
//主页



//默认首页
Route::get('/', function () {
    return view('home.index.default');
});

//问题页
Route::get('question', function () {
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

//用户个人页
Route::get('user', function () {
    return view('home.user.userinfo');
});

//基本信息设置
Route::get('settings/profile', function(){
    return view('home.settings.settings');
})->name('settings.profile');
//账户密码设置
Route::get('settings/account', function(){
    return view('home.settings.account');
})->name('settings.account');
//消息和邮件
Route::get('settings/notification', function(){
    return view('home.settings.messages');
})->name('settings.notification');
//屏蔽
Route::get('settings/filter', function(){
    return view('home.settings.shield');
})->name('settings.filter');

// 我的收藏
Route::get('collect/collections',function(){
    return view('home.collect.collections');
})->name('collect/collections');

// 我关注的问题
Route::get('collect/following', function(){
    return view('home.collect.following');
})->name('collect.following');

// 邀请我回答的问题
Route::get('collect/myQuestion', function(){
    return view('home.collect.myQuestion');
})->name('collect.myQuestion');