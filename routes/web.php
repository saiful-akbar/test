<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

/**
 * Route guard
 */
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::post('/message', [LandingController::class, 'sendMessage'])->name('landing.send.message');
