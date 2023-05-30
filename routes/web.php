<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("/", [BlogController::class, "index"])->name("home");

Route::middleware("guest")->group(function () {
    //Les routes d'inscription
    Route::get("/register", [InscriptionController::class, "show"]);
    Route::post("/register", [InscriptionController::class, "register"])
        ->name("register");
    Route::get("/login", [ConnexionController::class, "show"]);
    Route::post("/login", [ConnexionController::class, "login"])
        ->name("login");
});


Route::middleware("auth")->group(function () {
    Route::post("/logout", [DeconnexionController::class, "logout"])
        ->name("logout");
});
