# Introduction

This package is a laravel wrapper for the [progresivjose/piano-oauth](https://github.com/progresivjose/piano-oauth) package

## Requirements
- PHP ^8.1
- Laravel ^10

## Instalation

First you need to install the package in your laravel project

```bash
composer require progresivjose/laravel-piano-oauth
```

Then you'll need to include the provider in the *config/app.php* file

```php
'providers' => ServiceProvider::defaultProviders()->merge([
    /*
    * Application Service Providers...
    */

    Progresivjose\LaravelPianoOauth\Providers\PianoOauthProvider::class,
])->toArray(),

```

After that you can run the vendor:publish to import the assets and config files.

```bash
php artisan vendor:publish
````

Then you must run the migration command to create the piano_users table

```bash
php artisan migrate
````

After that you must change the *config/auth.php* file and replace the *App\User.php* value from the providers config to *\Progresivjose\LaravelPianoOauth\Models\PianoUser::class*

```php
'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => \Progresivjose\LaravelPianoOauth\Models\PianoUser::class,
    ],
]
````

And that's all you must do to use the Piano Oauth in your laravel project