<?php

use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocmedController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WorkExperienceController;

/**
 * Route guest
 */
Route::get("/", [MainController::class, "index"])->name("main.home");
Route::get("/about", [MainController::class, "about"])->name("main.about");
Route::get("/resume", [MainController::class, "resume"])->name("main.resume");
Route::get("/contact", [MainController::class, "contact"])->name("main.contact");
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
        Route::prefix("account")->group(function () {

            // Route account
            Route::get("/", [UserController::class, "index"])->name("dashboard.account");
            Route::patch("/{user}", [UserController::class, "update"])->name("dashboard.account.update");

            // Route profile
            Route::get("/profile", [ProfileController::class, "index"])->name("dashboard.profile");
            Route::patch("/profile/{profile}", [ProfileController::class, "updateProfile"])->name("dashboard.profile.update");

            // Route social media
            Route::get('/socmed', [SocmedController::class, 'index'])->name('dashboard.socmed');
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
                Route::get("/create", [WorkExperienceController::class, "create"])->name("dashboard.work-experience.create");
                Route::post("/", [WorkExperienceController::class, "store"])->name('dashboard.work-experience.store');
                Route::get('/{id}/edit', [WorkExperienceController::class, 'edit'])->name('dashboard.work-experience.edit');
                Route::patch("/{id}", [WorkExperienceController::class, "update"])->name('dashboard.work-experience.update');
            });
        });

        /**
         * Route Skill
         */
        Route::prefix('skill')->group(function () {
            Route::get('/', [SkillController::class, 'index'])->name('dashboard.skill');
        });
    });


    /**
     * Route api
     */
    Route::prefix('api/app')->group(function () {

        /**
         * Route group api work experience
         */
        Route::prefix('work-experience')->group(function () {
            Route::get('/', [WorkExperienceController::class, 'getAll'])->name('api.work-experience');
            Route::get('/{id}', [WorkExperienceController::class, 'detail'])->name('api.work-experience.detail');
            Route::delete('/{id}', [WorkExperienceController::class, 'delete'])->name('api.work-experience.delete');
        });

        /**
         * Route group api skill
         */
        Route::prefix('skill')->group(function () {
            Route::get('/', [SkillController::class, 'getData'])->name('api.skill');
            Route::post('/', [SkillController::class, 'store'])->name('api.skill.store');
            Route::get('/{skill}/edit', [SkillController::class, 'edit'])->name('api.skill.edit');
            Route::patch('/{skill}', [SkillController::class, 'update'])->name('api.skill.update');
            Route::delete('/{skill}', [SkillController::class, 'destroy'])->name('api.skill.delete');
        });

        /**
         * Route group api socmed
         */
        Route::prefix('socmed')->group(function () {
            Route::get('/', [SocmedController::class, 'dataTable'])->name('api.socmed');
            Route::post('/', [SocmedController::class, 'store'])->name('api.socmed.store');
        });
    });
});
