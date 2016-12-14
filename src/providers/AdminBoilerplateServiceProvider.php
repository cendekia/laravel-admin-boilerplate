<?php

namespace Cendekia\LaravelAdminBoilerplate\Providers;

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
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'viewBoiler');

        $this->publishes([
            __DIR__.'/../../public/' => public_path('vendor/cendekia/laravel-admin-boilerplate'),
            __DIR__.'/../../public/images/' => public_path('vendor/cendekia/laravel-admin-boilerplate/build/images'),
            __DIR__.'/../config/admin_boilerplate.php' => config_path('admin_boilerplate.php'),
            __DIR__.'/../support/' => app_path('Support'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/../routes/admin.php';
        $this->app->make('Cendekia\LaravelAdminBoilerplate\Controllers\AdminBoilerplateController');
    }
}
