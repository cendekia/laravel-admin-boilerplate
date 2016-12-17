<?php

return [
	// admin name and description
	'admin_name' => env('ADMIN_NAME', 'Admin <b>CMS</b>'),
	'admin_desc' => env('ADMIN_DESC', 'Laravel Admin Boilerplate'),

	// admin url prefix
	'url' => env('ADMIN_URL', 'admin-cms'),
	
	// admin asset path
	'asset' => 'vendor/cendekia/laravel-admin-boilerplate',
	'elixir' => 'vendor/cendekia/laravel-admin-boilerplate/build',

	// admin controller path
	'controller_path' => 'App\Http\Controllers\Admin'

];