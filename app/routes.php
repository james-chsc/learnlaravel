<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('admin/logout', [
    'as'    => 'admin.logout',
    'uses'  => 'App\Controllers\Admin\AuthController@getLogout'
]);

Route::get('admin/login', [
    'as'    =>  'admin.login',
    'uses'  =>  'App\Controllers\Admin\AuthController@getLogin'
]);

Route::post('admin/login', [
    'as'    =>  'admin.login.post',
    'uses'  =>  'App\Controllers\Admin\AuthController@postLogin'
]);

Route::group([
    'prefix'    =>  'admin',
    'before'    =>  'auth.admin'    // filter in app/filter.php
], function()
{
    Route::any('/', 'App\Controllers\Admin\PageController@index');
    Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
    Route::resource('pages', 'App\Controllers\Admin\PagesController');
});