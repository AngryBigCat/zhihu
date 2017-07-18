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

//话题增加
Route::get('/admin/topiccreate',function(){
    return view('admin.topic.topiccreate');
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
Route::group(['prefix' => 'people', 'middleware' => 'auth'], function () {
    // 我的主页动态
    Route::get('activitie/{id}', 'PeopleController@activitie');
    Route::get('activities', 'PeopleController@activities')->name('people.act');
    // 我的主页回答
    Route::get('answers', 'PeopleController@answers')->name('people.answers');
    // 我的主页提问
    Route::get('asks', 'PeopleController@asks')->name('people.asks');
    // 我的主页话题
    Route::get('topics', 'PeopleController@topics')->name('people.topics');
    Route::get('columns', 'PeopleController@columns')->name('people.columns');
    Route::get('collections', 'PeopleController@collections')->name('people.collections');
    // 我的主页关注
    Route::get('following', 'PeopleController@following')->name('people.following');
    // 我的主页被关注
    Route::get('follower', 'PeopleController@follower')->name('people.follower');
    // 我的主页关注的问题
    Route::get('following/questions', 'PeopleController@follow_question')->name('people.following.questions');
    // 修改个人信息
    Route::post('edit', 'PeopleController@edit');
    // 修改头像
    Route::post('edit_headPic', 'PeopleController@edit_headPic');
    // 修改封面图片
    Route::post('edit_cover', 'PeopleController@edit_cover');
    // 取消关注
    Route::post('toggle_follow', 'PeopleController@toggle_follow');
});



// 后台登录检测
Route::get('admin/login', 'admin\LoginController@login')->name('admin.login');
Route::post('admin/login', 'admin\LoginController@doLogin')->name('admin.dologin');

// 后台路由组中间件检测
Route::group(['prefix'=>'admin', 'middleware' => 'adminLogin'], function() {

 // 用户管理
    Route::get('/', 'admin\LoginController@index');
    // 用户--后台
    Route::resource('user','admin\UserController');
    // 用户软删除
    Route::get('users/delList', 'admin\UserDelListController@delList')->name('user.delList');
    // 还原软删除数据
    Route::get('users/reco/{id}', 'admin\UserDelListController@reUser');
    // 永久删除模型数据
    Route::get('users/del/{id}', 'admin\UserDelListController@delUser');
    // 用户注销
    Route::get('logout', 'admin\LoginController@logout')->name('admin.logout');

// 回答管理
    Route::resource('answer', 'admin\AnswerController');
    // 软删除回答列表
    Route::get('del_answer', 'admin\AnsDelListController@del_answerList')->name('answer.del_answer');
    // 还原软删除回答数据
    Route::get('rec_answer/{id}', 'admin\AnsDelListController@rec_answer')->name('answer.rec_answer');
    // 彻底删除回答数据
    Route::get('del_answer/{id}', 'admin\AnsDelListController@del_answer');
});
