<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::resource('lessons', 'LessonsController');
});


Route::group(['prefix' => 'v2'], function () {
    Route::get('banner', function () {
        return response()->json([
            'code' => 0,
            'msg' => '这里是消息',
            'data' => [
                'id' => 1,
                'name' => '刘康',
                'url' => 'lakgame.win'
            ]
        ]);
    });
});
