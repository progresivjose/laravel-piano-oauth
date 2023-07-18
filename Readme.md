# Introduction

This package is a laravel wrapper for the [progresivjose/piano-oauth](https://github.com/progresivjose/piano-oauth) package

## Requirements
- PHP ^8.1
- Laravel ^10

## Instalation

First you need to install the package in your laravel project

```bash
composer require progresivjose/laravel-piano-oauth -W
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

Then you should add this two lines into the *app\Http\Kernel.php* file

```php
protected $middleware = [
        //...
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
];
```

And that's all you must do to use the Piano Oauth in your laravel project

## Enviroment Values

The package expects the following values in your .env file

- PIANO_AID
- PIANO_API_TOKEN
- PIANO_OAUTH_CLIENT_SECRET
- PIANO_AUTH_GUARD
- PIANO_API_URL

### Configuration

The package creates a *confi/piano.php* files, which stores all the confirgurations needed for the package, but the redirect_url value is set for sandbox and testing puposes, for production you must use https://id.tinypass.com/id
