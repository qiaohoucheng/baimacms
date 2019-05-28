<?php

Route::redirect('/', '/home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('breadcrumbs'); //概览
Route::group(['namespace' => 'Admin','middleware' => ['auth','breadcrumbs']], function(){
    /*  ---------  暂时路由  ----------*/
    Route::post('/website-carousel/move', 'CarouselController@move');//移动
    Route::post('/website-link/move', 'LinkController@move');//移动
    Route::post('/website-case/move', 'CaseController@move');//移动
    /*  ---------  网站管理路由  --------  */
    Route::resource('website-nav','NavController'); //导航管理
    Route::resource('website-index','WebsiteController'); //首页管理
    Route::resource('website-carousel','CarouselController'); //轮播图管理
    Route::resource('website-spread','SpreadController'); //推广管理
    Route::resource('website-main','MainController'); //精品推荐
    Route::resource('website-link','LinkController'); //友情链接
    Route::resource('website-case','CaseController'); //成功案例
    /*  ---------  页面管理路由  --------  */
    Route::resource('page-index','PageController'); //首页管理
    Route::resource('page-solutiona','PageSolutionaController'); //能源计量与计费管理
    Route::resource('page-solutionb','PageSolutionbController'); //智能变配电运维管理
    Route::resource('page-service','PageServiceController'); //服务中心
    Route::resource('page-download','PageDownloadController'); //下载中心
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
    Route::resource('setting-weixin','WeixinController');  //微信设置
    Route::resource('setting-api','ApiController');  //api设置
    Route::resource('setting-user/info','UserInfoController');  //个人信息 基本设置
    Route::resource('setting-user/password','UserPasswordController');  //修改密码
    /*  ---------  文件操作  --------  */
    Route::post('file/upload','FilesController@upload');
});
