<?php


Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('breadcrumbs');
Route::group(['namespace' => 'Admin','middleware' => ['auth','breadcrumbs']], function(){
    //Route::get('/index','IndexController@index')->name('index');
    Route::resource('website','WebsiteController');
});
