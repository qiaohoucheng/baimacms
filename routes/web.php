<?php

Route::redirect('/', '/home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('breadcrumbs'); //概览
Route::group(['namespace' => 'Admin','middleware' => ['auth','breadcrumbs']], function(){
    /*  ---------  网站管理路由  --------  */
    Route::resource('website-index','WebsiteController'); //首页管理
    Route::resource('website-carousel','CarouselController'); //轮播图管理
    Route::resource('website-spread','SpreadController'); //推广管理
    Route::resource('website-main','MainController'); //精品推荐
    Route::resource('website-link','LinkController'); //友情链接
    /*  ---------  内容管理路由  --------  */
    Route::resource('article-lists','ArticleController'); //文章列表
    Route::resource('article-comment','ArticleController'); //评论管理
    Route::resource('article-tag','ArticleController'); //标签管理
    Route::resource('article-temp','ArticleController'); //模板管理
    /*  ---------  分类管理路由  --------  */
    Route::resource('type-index','TypeController');  //内容分类
    /*  ---------  用户管理路由  --------  */
    Route::resource('member-index','MemberController'); //用户列表
    /*  ---------  资源管理路由  --------  */
    Route::resource('resource-index','ResourceController'); //资源列表
    /*  ---------  文档管理路由  --------  */
    Route::resource('doc-index','DocController');  //文档列表
    /*  ---------  权限管理路由  --------  */
    Route::resource('power-users','UsersController');   //管理员列表
    Route::resource('power-group','GroupController');   //用户组管理
    Route::resource('power-menu','MenuController');   //菜单管理
    /*  ---------  扩展管理路由  --------  */
    Route::resource('extend-crawler','CrawlerController');  //爬虫管理
    Route::resource('extend-qrcode','QrcodeController');  //二维码管理
    /*  ---------  设置路由  --------  */
    Route::resource('setting-web','SettingController');  //设置
    Route::resource('setting-weixin','WeixinController');  //设置
    Route::resource('setting-api','ApiController');  //设置
});
