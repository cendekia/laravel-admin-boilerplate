<?php

$prefix = config('admin_boilerplate.url');
$path = config('admin_boilerplate.controller_path');

Route::group(['prefix' => $prefix, 'namespace' => $path], function () {
    Route::get('signin', 'AuthController@getSignIn');
    Route::post('signin', 'Admin\AuthController@postSignIn');
});

Route::group(['prefix' => $prefix, 'namespace' => $path, 'middleware' => ['admin.auth']], function() use ($path) {
	Route::get('/',  'AdminBoilerplateController@index');
});
