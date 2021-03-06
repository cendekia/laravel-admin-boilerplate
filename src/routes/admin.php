<?php

$prefix = config('admin.url');
$path = config('admin.controller_path');

Route::group(['prefix' => $prefix, 'namespace' => $path, 'middleware' => ['web']], function () {
    Route::get('signin', 'AuthController@getSignIn')->middleware('admin.logged');
    Route::post('signin', 'AuthController@postSignIn')->middleware('admin.logged');
	
	Route::group(['middleware' => ['admin.auth']], function() {
		Route::get('/',  'DashboardController@index');
		Route::get('/members/ajax',  ['uses' => 'MemberController@getData', 'as' => 'members.ajax']);
		Route::resource('/members',  'MemberController');
		Route::get('signout', 'AuthController@getSignOut');
	});
});
