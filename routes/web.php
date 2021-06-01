<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkExperienceController;

/**
 * Route guest
 */
Route::get("/", [MainController::class, "index"])->name("main.home");
Route::post("/message", [MainController::class, "sendMessage"])->name("main.send.message");

/**
 * Route auth
 */
Route::prefix("auth")->group(function () {
    Route::get("/login", [AuthController::class, "index"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.user");
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");
});


/**
 * Route auth
 */
Route::middleware(["auth"])->group(function () {

    /**
     * Route group app untuk admin dashboard
     */
    Route::prefix("app")->group(function () {

        /**
         * Home route
         */
        Route::get("home", [HomeController::class, "index"])->name("dashboard.home");

        /**
         * Route message
         */
        Route::prefix("message")->group(function () {
            Route::get("/", [MessageController::class, "index"])->name("dashboard.message");
            Route::get("/{message}", [MessageController::class, "detail"])->name("dashboard.message.detail");
            Route::delete("/{message}", [MessageController::class, "delete"])->name("dashboard.message.delete");
        });

        /**
         * Route profile
         */
        Route::prefix("profile")->group(function () {
            Route::get("/", [ProfileController::class, "index"])->name("dashboard.profile");
            Route::patch("/{profile}", [ProfileController::class, "updateProfile"])->name("dashboard.profile.update");
            Route::patch("/account/{user}", [ProfileController::class, "updateAccount"])->name("dashboard.account.update");
        });

        /**
         * Route resume
         */
        Route::prefix("resume")->group(function () {

            /**
             * Route resume education
             */
            Route::prefix("education")->group(function () {
                Route::get("/", [EducationController::class, "index"])->name("dashboard.education");
                Route::get("/create", [EducationController::class, "create"])->name("dashboard.education.create");
                Route::get("/{education}", [EducationController::class, "detail"])->name("dashboard.education.detail");
                Route::post("/", [EducationController::class, "store"])->name("dashboard.education.store");
                Route::get("/{education}/edit", [EducationController::class, "edit"])->name("dashboard.education.edit");
                Route::patch("/{education}", [EducationController::class, "update"])->name("dashboard.education.update");
                Route::delete("/{education}", [EducationController::class, "delete"])->name("dashboard.education.delete");
            });

            /**
             * Route resume work experience
             */
            Route::prefix("work-experience")->group(function () {
                Route::get("/", [WorkExperienceController::class, "index"])->name("dashboard.work-experience");
            });
        });

        /**
         * Route Skill
         */
        Route::prefix('skill')->group(function () {
            Route::get('/', [SkillController::class, 'index'])->name('dashboard.skill');
        });
    });
});
