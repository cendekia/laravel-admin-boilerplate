<?php

use Illuminate\Contracts\Routing\UrlGenerator;


/**
 * Generate a url for the application.
 *
 * @param  string  $path
 * @param  mixed   $parameters
 * @param  bool    $secure
 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
 */
function admin_url($path = null, $parameters = [], $secure = null)
{
    if (is_null($path)) {
        return app(UrlGenerator::class);
    }

    $path = config('admin.url') . '/' . $path;

    return app(UrlGenerator::class)->to($path, $parameters, $secure);
}

/**
 * Generate an asset path for the application.
 *
 * @param  string  $path
 * @param  bool    $secure
 * @return string
 */
function admin_asset($path = null, $secure = null)
{
	$path = config('admin.asset') . '/' . $path;

    return app('url')->asset($path, $secure);
}

function admin_theme($attribute = 'color')
{
    return config('admin.themes.'.$attribute);
}

/**
 * Get the path to a versioned Elixir file.
 *
 * @param  string  $file
 * @param  string  $buildDirectory
 * @return string
 *
 * @throws \InvalidArgumentException
 */
function admin_elixir($file, $buildDirectory = 'vendor/cendekia/laravel-admin-boilerplate/build')
{
    static $manifest = [];
    static $manifestPath;

    if (empty($manifest) || $manifestPath !== $buildDirectory) {
        $path = public_path($buildDirectory.'/rev-manifest.json');

        if (file_exists($path)) {
            $manifest = json_decode(file_get_contents($path), true);
            $manifestPath = $buildDirectory;
        }
    }

    if (isset($manifest[$file])) {
        return '/'.trim($buildDirectory.'/'.$manifest[$file], '/');
    }

    $unversioned = public_path($file);

    if (file_exists($unversioned)) {
        return '/'.trim($file, '/');
    }

    throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
}