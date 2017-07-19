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
//内容上传
Route::post('upload', 'UploadController@upload');

//提问时添加话题弹出的话题列表
Route::get('search/topic/{key?}', 'SearchController@topicSearch');
//测试路由
Route::get('search/topic/{key?}/insert', 'SearchController@testInsertTopic');
Route::get('search/topic/{key?}/insert', function ($key) {
    return \App\Tag::create([
        'pid' => 1,
        'path' => 'www',
        'tag_name' => $key,
        'description' => 'asdasdqweqweqwe',
        'img' => '/img/avatar04.png',
    ]);
});




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




// 发现列表页面
Route::any('/admin/listFound','admin\ListFoundController@index')->name('listFound');
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
Route::get('admin/adEdit/{id}','admin\ListAdvertisementController@adEdit')->name('adEdit');
Route::post('admin/doAdEdit','admin\ListAdvertisementController@doAdEdit')->name('doAdEdit');



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

Route::get('found','FoundController@found')->name('found');
Route::get('retui','FoundController@retui')->name('retui');
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

// 我的主页
Route::group(['prefix' => 'people', 'middleware' => 'auth'], function () {
    // 我的主页回答
    Route::get('answers', 'PeopleController@answers')->name('people.answers');
    Route::get('answer/{id}', 'PeopleController@answer');
    // 我的主页提问
    Route::get('asks', 'PeopleController@asks')->name('people.asks');
    // 我的主页话题
    Route::get('topics', 'PeopleController@topics')->name('people.topics');
    // 自己的收藏
    Route::get('collections', 'PeopleController@collections')->name('people.collections');
    // 关注的收藏
    Route::get('following/collections', 'PeopleController@follow_collection')->name('people.following.collections');
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
    // 关注与取消关注
    Route::post('toggle_follow', 'PeopleController@toggle_follow');
});



// 后台登录检测
Route::get('admin/login', 'admin\LoginController@login')->name('admin.login');
Route::post('admin/login', 'admin\LoginController@doLogin')->name('admin.dologin');

// 后台路由组中间件检测
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function() {

 // 用户管理
    Route::get('/', 'admin\LoginController@index');
    // 用户注销
    Route::get('logout', 'admin\LoginController@logout')->name('admin.logout');
    // 用户--后台
    Route::resource('user','admin\UserController');
    // 用户软删除
    Route::get('users/delList', 'admin\UserDelListController@delList')->name('user.delList');
    // 还原软删除数据
    Route::get('users/reco/{id}', 'admin\UserDelListController@reUser');
    // 永久删除模型数据
    Route::get('users/del/{id}', 'admin\UserDelListController@delUser');
    

// 回答管理
    // 回答列表
    Route::get('answers/ans_list', 'admin\AnswerController@index');
    // 删除回答
    Route::post('answer/ans_del/{id}', 'admin\AnswerController@ans_del');
    // 修改回答
    Route::post('answer/update_ans/{id}', 'admin\AnswerController@update_ans');

    // 软删除回答列表
    Route::get('del_answer', 'admin\AnsDelListController@del_answerList')->name('answer.del_answer');
    // 还原软删除回答数据
    Route::get('rec_answer/{id}', 'admin\AnsDelListController@rec_answer')->name('answer.rec_answer');
    // 彻底删除回答数据
    Route::get('del_answer/{id}', 'admin\AnsDelListController@del_answer');
    // 某个问题下的所有回答
    Route::get('que_anslist/{id}', 'admin\AnsDelListController@que_anslist');
});



   
    
// 后台话题
Route::group(['middleware'=>'adminLogin'], function(){
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

     //评论列表
    Route::get('/admin/commentlist','admin\CommentController@index');
    //评论删除
    Route::get('/admin/commentdelete/{id}','admin\CommentController@delete');
    //评论修改
    Route::post('/admin/commentmodify/{id}','admin\CommentController@modify');
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