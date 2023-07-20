<?php

use Illuminate\Support\Facades\Route;
use Progresivjose\LaravelPianoOauth\Controllers\Auth\LoginController;
use Progresivjose\LaravelPianoOauth\Controllers\Auth\LogoutController;

Route::group(['middleware' => ['web']], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('post-login', [LoginController::class, 'postLogin'])->name('post-login');
    Route::get('login/failed', [LoginController::class, 'failed'])->name('login.failed');

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});
