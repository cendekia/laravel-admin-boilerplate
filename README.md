# Laravel Admin Boilerplate
[![Laravel 5.x](https://img.shields.io/badge/Laravel-5.x-green.svg)](http://laravel.com)
[![Status dev](https://img.shields.io/badge/status-dev-red.svg)](http://laravel.com)

A boilerplate of laravel administrator package for laravel 5.

## Installation
1. Run `composer require cendekia/laravel-admin-boilerplate`
2. Run `composer install`
3. Add providers
  ``` php
  providers => [

    ...
    Cendekia\LaravelAdminBoilerplate\AdminBoilerplateServiceProvider::class,
    ...

  ]
  ```
4. Run `php artisan vendor:publish`
5. Defining One to One Relationship between User and UserRole, add this userRole method on existing User model:
``` php
	public function userRole()
    {
        return $this->hasOne(UserRole::class);
    }
```
