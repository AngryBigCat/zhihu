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
//删除问题
Route::delete('question/{id}', 'QuestionController@delete')->middleware('auth');
//问题页
Route::get('question/{id}', 'QuestionController@show')->middleware('auth')->name('question.show');
//关注问题、取消关注问题
Route::post('question/{id}/toggleFollow', 'QuestionController@toggleFollow')->middleware('auth');
//问题下的获取评论，必须写在 “回答排序”路由 的上面
Route::get('question/{id}/comment', 'QuestionController@indexCommentByQuestionID');
//问题下的提交评论，必须写在 “回答排序”路由 的上面
Route::post('question/{id}/comment', 'QuestionController@storeCommentByQuestionID')->middleware('auth');
//获取该问题的回答
Route::get('question/{id}/answer/{aid}', 'QuestionController@showContainAuthor');
//获取该问题的关注用户
Route::get('question/{id}/followers', 'QuestionController@getFollowersByQuestionID');
//回答排序
Route::get('question/{id}/mostthumb', 'QuestionController@mostThumbSort');
Route::get('question/{id}/latest', 'QuestionController@latestSort');
Route::get('question/{id}/oldest', 'QuestionController@oldestSort');
Route::get('search/topic/{key?}', 'SearchController@topicSearch');



//提交回答
Route::post('answer', 'AnswerController@store')->middleware('auth')->name('answer.store');
//更新回答
Route::put('answer/{id}', 'AnswerController@update')->middleware('auth')->name('answer.update');
//删除回答
Route::delete('answer/{id}', 'AnswerController@delete')->middleware('auth');
//
Route::patch('answer/{id}/restore', 'AnswerController@restore')->middleware('auth');
//获取评论，这条路由必须放在 “点赞、取消点赞” 这条路由的前面
Route::get('answer/{id}/comment', 'AnswerController@indexCommentByAnswerID');
//提交评论，这条路由必须放在 “点赞、取消点赞” 这条路由的前面
Route::post('answer/{id}/comment', 'AnswerController@storeCommentByAnswerID')->middleware('auth');
//点赞、取消点赞
Route::post('answer/{id}/{type}', 'AnswerController@toggleVote')->middleware('auth');

//刷新验证码
Route::get('login/refereshcapcha', 'Auth\LoginController@refereshcapcha');

//关注用户、取消用户
Route::post('user/{id}/toggleFollow', 'UserController@toggleFollow')->middleware('auth');
Route::get('user/{id}/followers', 'UserController@getFollowersByAuthorID');
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
Route::get('found',function(){
    return view('home.found.found');
})->name('found');

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

//后台首页
Route::get('/admin','admin\AdminController@index');

//后台评论
Route::group([], function(){
    //评论列表
    Route::get('/admin/commentlist','admin\CommentController@index');
    //评论删除
    Route::get('/admin/commentdelete/{id}','admin\CommentController@delete');
    //评论修改
    Route::post('/admin/commentmodify/{id}','admin\CommentController@modify');
    
});
// 后台话题
Route::group([], function(){
    //话题列表
    Route::get('/admin/listtopic','admin\TopicController@listtopic');
        //话题删除
    Route::get('/admin/topicdelete','admin\TopicController@delete');
    //话题增加get页面
    Route::get('/admin/topiccreate','admin\TopicController@topiccreate');
    //话题添加post操作
    Route::post('/admin/topiccreate','admin\TopicController@create');
    // 话题编辑get页面
    Route::get('/admin/topicupdate','admin\TopicController@topicupdate');
    //话题更新post操作
    Route::post('/admin/topicupdate','admin\TopicController@update');
});

//前台话题
Route::group([], function(){
    //热门排序话题页面
    Route::get('/topic/{id}','TopicController@index')->name('topic');
    //时间排序话题页面
    Route::get('/topicTimeTag/{id}','TopicController@topicTimeTag');
    //用户没关注话题的时间跳这个
    Route::get('topic','TopicController@topicConcern');
    //话题广场分类
    Route::get('/topicSquare/{id}','TopicController@topicClassify');
    //热门排序话题详情
    Route::get('/topicDetails/{id}','TopicController@topicHot');
    //时间排序话题详情
    Route::get('topicTime/{id}','TopicController@topicTime');
    //关注发送ajax
    Route::get('/ajaxd','TopicController@ajaxd');
    Route::POST('/ajaxs','TopicController@ajaxs');  
});