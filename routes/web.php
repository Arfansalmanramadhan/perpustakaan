<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware("auth");
Route::controller(AuthController::class)->group(function () {
    Route::get("login", "login")->name("login");
    Route::post("login", "authenticating");
    Route::get("register", "register");
});
Route::get("dashboard", [DashboardController::class, "index"])->middleware(["auth", "admin"]);
Route::get("profile", [UserController::class, "profile"])->middleware(["auth", "client"]);
