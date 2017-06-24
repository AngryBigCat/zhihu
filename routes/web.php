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

Route::get('/', function () {
    return view('home.index');
});
Route::get('/admin', function(){
	return 'bbbbb';
});
// 前台登录
Route::get('/home/login','LoginController@login');
Route::post('/home/login','LoginController@dologin');
Route::get('/home/login_form2','LoginController@login_form2');