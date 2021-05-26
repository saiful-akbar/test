<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

/**
 * Route guest
 */
Route::get('/', [MainController::class, 'index'])->name('main.home');
Route::post('/message', [MainController::class, 'sendMessage'])->name('main.send.message');

/**
 * Route auth
 */
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/**
 * Route auth
 */
Route::middleware(['auth'])->group(function () {

    /**
     * Route group app untuk admin dashboard
     */
    Route::prefix('app')->group(function () {

        /**
         * Home route
         */
        Route::get('home', [HomeController::class, 'index'])->name('dashboard.home');

        /**
         * Route message
         */
        Route::prefix('message')->group(function () {
            Route::get('/', [MessageController::class, 'index'])->name("dashboard.message");
            Route::get('/{message}', [MessageController::class, 'detail'])->name("dashboard.message.detail");
            Route::delete('/{message}', [MessageController::class, 'delete'])->name('dashboard.message.delete');
        });

        /**
         * Route profile
         */
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('dashboard.profile');
            Route::patch('/{profile}', [ProfileController::class, 'updateProfile'])->name('dashboard.profile.update');
            Route::patch('/account/{user}', [ProfileController::class, 'updateAccount'])->name('dashboard.account.update');
        });
    });
});
