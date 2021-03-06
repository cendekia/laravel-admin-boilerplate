<?php

namespace Cendekia\LaravelAdminBoilerplate;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AdminBoilerplateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-view');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/models' => app_path('Models')
        ], 'models');

        $this->publishes([
            __DIR__.'/config/admin.php' => config_path('admin.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/middleware' => app_path('Http/Middleware/Admin/'),
        ], 'middleware');

        $this->publishes([
            __DIR__.'/controllers/' => app_path('Http/Controllers/Admin'),
        ], 'controller');

        $this->publishes([
            __DIR__.'/../public/' => public_path('vendor/cendekia/laravel-admin-boilerplate'),
            __DIR__.'/../public/images/' => public_path('vendor/cendekia/laravel-admin-boilerplate/build/images'),
            __DIR__.'/../public/fonts/' => public_path('vendor/cendekia/laravel-admin-boilerplate/build/fonts')
        ], 'asset');

        $this->publishes([
            __DIR__.'/support/' => app_path('Support'),
        ], 'helper');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/admin-view'),
        ], 'template');

        $router->middleware('admin.auth', 'App\Http\Middleware\Admin\AdminAuthenticate');
        $router->middleware('admin.logged', 'App\Http\Middleware\Admin\RedirectIfAuthenticated');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes/admin.php';
    }
}
