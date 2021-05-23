<?php

use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MessageController;

/**
 * Route guest
 */
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::post('/message', [LandingController::class, 'sendMessage'])->name('landing.send.message');

/**
 * Route auth
 */
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


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
        Route::get('message', [MessageController::class, 'index'])->name("dashboard.message");
        Route::delete('message/{message}', [MessageController::class, 'delete'])->name('dashboard.message.delete');

        Route::get('message/{id}', function ($id) {
            $message = Message::find($id);

            if ($message->message_read_status == 0) {
                $message->message_read_status = 1;
                $message->save();
            }

            echo "Halaman Detail Pesan id {$id} telah dibaca";
        })->name("dashboard.message.detail");
    });
});
