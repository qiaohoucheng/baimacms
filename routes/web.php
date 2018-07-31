<?php


Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Admin'], function(){
    //Route::get('/index','IndexController@index')->name('index');
    Route::resource('website','WebsiteController');
});
