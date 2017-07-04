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

//登录注册权限路由
Auth::routes();

//默认首页
Route::get('/', 'HomeController@index');

//提交问题
Route::post('question', 'QuestionController@store')->middleware('auth')->name('question.store');

//问题页
Route::get('question/{id}', 'QuestionController@show')->middleware('auth')->name('question.show');
//关注问题、取消关注问题
Route::post('question/{id}/toggleFollow', 'QuestionController@toggleFollow')->middleware('auth');
//排序
Route::get('question/{id}/{sortType}', 'QuestionController@toggleSort');

//提交回答
Route::post('answer', 'AnswerController@store')->middleware('auth')->name('answer.store');
//点赞、取消点赞
Route::post('answer/{id}/{type}', 'AnswerController@toggleVote')->middleware('auth');


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

//用户个人页
Route::get('user', function() {
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
Route::get('found','FoundController@found')->name('found');
Route::get('retui','FoundController@retui')->name('retui');
Route::get('found/more','FoundController@more')->name('found/more');

// 知乎草案（协议）
Route::get('deal',function(){
    return view('home.deal');
})->name('deal');

// 知乎举报
Route::get('jubao',function(){
    return view('home.jubao');
})->name('jubao');
// 联系我们
Route::get('contact',function(){
    return view('home.contact');
})->name('contact');

// 话题
Route::get('topic','TopicController@index')->name('topic');
// 内容
Route::get('topic/{id}','TopicController@tag');

// 我的主页
Route::group(['prefix' => 'people'], function () {
    Route::get('activities', 'PeopleController@activities');
    Route::get('answers', 'PeopleController@answers');
    Route::get('asks', 'PeopleController@asks');
    Route::get('columns', 'PeopleController@columns');
    Route::get('collections', 'PeopleController@collections');
    // 修改个人信息
    Route::post('edit', 'PeopleController@edit');
    // 修改头像
    Route::post('edit_headPic', 'PeopleController@edit_headPic');
});
