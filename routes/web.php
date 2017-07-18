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

// 发现列表页面
Route::any('/admin/listFound','admin\ListFoundController@index')->name('listFound');
// ajax更新数据
// Route::get('/amin/listAjax','admin\ListFoundController@index_ajax');
// 发现列表编辑
Route::any('/admin/edit/{id}/{pag}','admin\ListFoundController@edit')->name('found_edit');
Route::post('/admin/edit','admin\ListFoundController@do_edit')->name('edit');
// 发现列表删除
Route::any('admin/del/{id}/{pag}','admin\ListFoundController@del');
// ajax更新图片
Route::any('admin/found/ajax','admin\ListFoundController@ajax')->name('found_ajax');

// 后台问题
Route::get('admin/listQuestion','admin\ListQuestionController@index')->name('listQuestion');

// 后台收藏
Route::get('admin/listCollect','admin\ListCollectController@index')->name('listCollect');
// 收藏修改
Route::get('admin/colEdit/{id}','admin\ListCollectController@edit');
Route::post('admin/colEdit','admin\ListCollectController@do_edit')->name('colEdit');
// 收藏删除
Route::get('admin/colDel/{id}','admin\ListCollectController@del');

// 后台广告
Route::get('admin/adAdd','admin\ListAdvertisementController@adAdd')->name('adAdd');
Route::post('admin/adAdd','admin\ListAdvertisementController@do_adAdd')->name('doAdd');
Route::post('admin/AD','admin\ListAdvertisementController@editAjax');//ajax更新广告地址
Route::post('admin/ad/ajax','admin\ListAdvertisementController@ajax');// ajax更新图片
Route::get('admin/listAD','admin\ListAdvertisementController@index')->name('listAD');
Route::get('admin/adDel/{id}','admin\ListAdvertisementController@del');

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
Route::get('collect/collections','CollectController@index')->name('collect.collections');
// 创建收藏夹
Route::post('collect/collectAdd','CollectController@collectAdd');
// 关注收藏夹
Route::get('collect/followAjax','CollectController@followAjax');
// 收藏夹内容
Route::get('collect/colQus/{id}','CollectController@collectQus');

// 我关注的问题
Route::get('collect/following', 'CollectController@follow')->name('collect.following');

// 邀请我回答的问题
Route::get('collect/myFollow', 'CollectController@myFollow')->name('collect.myFollow');

// 发现
// Route::get('found','FoundController@found')->name('found');
Route::get('collect','FoundController@collects')->name('found/collects');
Route::get('found/more','FoundController@more')->name('found/more');
Route::get('found/follow','FoundController@follow'); //ajax获取关注
Route::post('found/collect','FoundController@collect'); //获取收藏
Route::get('found/ritui','FoundController@ritui');
Route::get('found/yuetui','FoundController@yuetui');

Route::post('suggest','SuggestController@suggest');
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

