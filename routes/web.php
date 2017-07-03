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
//后台首页
Route::get('/admin',function(){
    return view('admin.index');
});
//话题列表
Route::get('/admin/listtopic',function(){
    return view('admin.topic.listtopic');
});

//话题增加
Route::get('/admin/topiccreate',function(){
    return view('admin.topic.topiccreate');
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
//搜索页
Route::get('search', function () {
    return view('home.search.default');
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

// 发现
Route::get('found',function(){
    return view('home.found.found');
})->name('found');
// 话题
Route::get('/topic','TopicController@index');
// 内容
Route::get('/topic/{id}','TopicController@tag');

