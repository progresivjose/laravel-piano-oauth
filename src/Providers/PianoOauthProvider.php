<?php

namespace Progresivjose\LaravelPianoOauth\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Progresivjose\PianoOauth\PianoOauth;

class PianoOauthProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {

        if (!$this->hasConfigLoaded()) {
            Log::error("There is a missing configuration for the package Laravel Piano Oauth");

            return null;
        }

        $this->app->instance(
            PianoOauth::class,
            new PianoOauth(
                config('piano.aid'),
                config('piano.api_token'),
                config('piano.oauth_client_secret'),
                config('piano.api_url')
            )
        );
    }

    private function hasConfigLoaded(): bool
    {
        return config('piano.aid') !== null
            && config('piano.api_token') !== null
            && config('piano.oauth_client_secret') !== null
            && config('piano.api_url') !== null;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../configs/piano.php' => config_path('piano.php'),
        ], 'piano-config');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-piano-oauth');
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/laravel-piano-oauth')
        ], 'public');
        $this->loadJsonTranslationsFrom(__DIR__.'/../lang', 'laravel-piano-oauth');
        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath("vendor/laravel-piano-oauth")
        ]);
    }

}
