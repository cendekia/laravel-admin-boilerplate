<?php

return [
	// admin name and description
	'name' => env('ADMIN_NAME', 'Admin <b>CMS</b>'),
	'description' => env('ADMIN_DESC', 'Laravel Admin Boilerplate'),

	// admin url prefix
	'url' => env('ADMIN_URL', 'admin-cms'),
	
	// admin asset path
	'asset' => 'vendor/cendekia/laravel-admin-boilerplate',
	'elixir' => 'vendor/cendekia/laravel-admin-boilerplate/build',

	// admin controller path
	'controller_path' => 'App\Http\Controllers\Admin',

	// boilerplate theme attributes
	'themes' => [
		// Color choices
			// (red, pink, purple, deep-purple, indigo, blue, light-blue, cyan, teal, green)
			// (yellow, amber, orange, deep-orange, brown, grey, blue-grey, black, light-green, lime)
		'color' => 'cyan', //default
	]

];