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

Route::group(['prefix' => 'v1','middleware'=>'cros'], function () {
    Route::get('users', function () {
        echo '测试路由';
        exit;
    });
    //基本信息
    Route::get('getConfig', 'V1Controller@get_config');
    //轮播图
    Route::get('getBanner', 'V1Controller@get_banner');
    //首页配置
    Route::get('getIndex', 'V1Controller@get_index_setting');
    //成功案例
    Route::get('getLink', 'V1Controller@get_link');
    //首页文章列表
    Route::get('post_lists', 'V1Controller@post_lists');
    //文章详情
    Route::get('post_detail/{id}', 'V1Controller@post_detail');
});