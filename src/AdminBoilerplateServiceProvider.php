<?php

namespace Cendekia\LaravelAdminBoilerplate;

use Illuminate\Support\ServiceProvider;

class AdminBoilerplateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-view');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/models' => app_path('Models')
        ], 'models');

        $this->publishes([
            __DIR__.'/config/admin_boilerplate.php' => config_path('admin_boilerplate.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/controllers/' => app_path('Http/Controllers/Admin'),
        ], 'controller');

        $this->publishes([
            __DIR__.'/../public/' => public_path('vendor/cendekia/laravel-admin-boilerplate'),
            __DIR__.'/../public/images/' => public_path('vendor/cendekia/laravel-admin-boilerplate/build/images')
        ], 'asset');

        $this->publishes([
            __DIR__.'/support/' => app_path('Support'),
        ], 'helper');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/admin'),
        ], 'template');
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
