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

//基本设置
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

//专栏首页
Route::get('column/index', function () {
    return view('home.column.columnIndex');
});
//专栏详情
Route::get('column/details', function () {
    return view('home.column.columndetails');
});

