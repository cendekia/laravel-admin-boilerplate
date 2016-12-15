<?php

$prefix = config('admin_boilerplate.url');
$path = config('admin_boilerplate.controller_path');

Route::get($prefix,  $path.'\AdminBoilerplateController@index');
