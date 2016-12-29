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

function current_page($page = '', $segment = 2, $class = 'active')
{
    return (\Request::segment($segment) == $page) ? $class : '';
}

function admin_edit_button($url, $admin)
{
    $allow = crud_check($admin);

    return ($allow['edit']) ? '<a href="'. $url .'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;' : '';
}

function admin_delete_button($url, $admin = null)
{
    $allow = crud_check($admin);

    return ($allow['destroy']) ? view('admin-view::default.delete_button', compact('url')) : '';
}

function crud_check($admin = null)
{
    //check if alpha
    $superAllow = false;
    $admin = ($admin) ?: \Auth::user();

    if (\Session::get('admin.role')->id == 1) {
        $superAllow = true;
    }

    //crud button permission check
    $action = \Route::getCurrentRoute()->getAction();
    $baseAction = str_replace('index', '', $action['as'], $count);
    $baseAction = ($count > 0) ? $baseAction : str_replace('ajax', '', $action['as'], $count);

    return [
        'create' => ($superAllow) ?: User::hasAccess($baseAction.'create', $admin),
        'edit' => ($superAllow) ?: User::hasAccess($baseAction.'edit', $admin),
        'destroy' => ($superAllow) ?: User::hasAccess($baseAction.'destroy', $admin),
    ];

}