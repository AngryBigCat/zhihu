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
Route::get('/', function () {
    return view('home.index');
});
//基本信息设置
Route::get('/user-Settings', function(){
	return view('home.user.Settings');
});
//账户密码设置
Route::get('/user-account', function(){
	return view('home.user.account');
});
//消息和邮件
Route::get('/user-Messages', function(){
	return view('home.user.Messages');
});
//屏蔽
Route::get('/user-shield', function(){
	return view('home.user.shield');
});

//专栏.发现
Route::get('/user-Column', function(){
	return view('home.Column.Column');
});