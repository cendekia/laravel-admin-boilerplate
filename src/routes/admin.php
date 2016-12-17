<?php

$prefix = config('admin_boilerplate.url');
$path = config('admin_boilerplate.controller_path');

Route::group(['prefix' => $prefix, 'namespace' => $path, 'middleware' => ['web']], function () {
    Route::get('signin', 'AuthController@getSignIn');
    Route::post('signin', 'AuthController@postSignIn');
});

Route::group(['prefix' => $prefix, 'namespace' => $path, 'middleware' => ['admin.auth', 'web']], function() use ($path) {
	Route::get('/',  'AdminBoilerplateController@index');
});
