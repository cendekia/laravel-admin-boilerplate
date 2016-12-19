<?php

$prefix = config('admin.url');
$path = config('admin.controller_path');

Route::group(['prefix' => $prefix, 'namespace' => $path, 'middleware' => ['web']], function () {
    Route::get('signin', 'AuthController@getSignIn');
    Route::post('signin', 'AuthController@postSignIn');
	Route::get('signout', 'AuthController@getSignOut');
	
	Route::group(['middleware' => ['admin.auth']], function() {
		Route::get('/',  'DashboardController@index');
	});
});
