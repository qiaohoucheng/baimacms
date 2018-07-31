<?php


Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('breadcrumbs'); //概览
Route::group(['namespace' => 'Admin','middleware' => ['auth','breadcrumbs']], function(){
    Route::resource('website','WebsiteController'); //网站管理
    Route::resource('article','ArticleController'); //内容管理
    Route::resource('type','TypeController');  //分类管理
    Route::resource('member','MemberController'); //用户管理
    Route::resource('resource','ResourceController'); //资源管理
    Route::resource('doc','DocController');  //文档管理
    Route::resource('power','PowerController');   //权限管理
    Route::resource('extend','ExtendController');  //扩展管理
    Route::resource('setting','SettingController');  //设置
});
