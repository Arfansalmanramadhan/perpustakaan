<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\pempinjamController;
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
    Route::get("login", "login")->name("login")->middleware("guestt");
    Route::post("login", "authenticating")->middleware("guestt");
    Route::get("logout", "logout")->middleware("auth");
    Route::get("register", "register")->middleware("guestt");
    Route::post("register", "registerproses")->middleware("guestt");
});
Route::get("dashboard", [DashboardController::class, "index"])->middleware(["auth", "admin"]);
Route::get("profile", [UserController::class, "profile"])->middleware(["auth", "client"]);
Route::get("user", [UserController::class, "user"])->middleware("auth");
Route::controller(BookController::class)->group(function(){
    Route::get("books","index")->middleware("auth");
    Route::get("tambah-buku","tambah")->middleware("auth");
});
Route::controller(kategoriController::class)->group(function () {
    Route::get("kategori",  "index")->middleware("auth");
    Route::get("tambah-kategori",  "tambah")->middleware("auth");
    Route::post("tambah-kategori",  "store")->middleware("auth");
    Route::get("edit-kategori/{slug}",  "edit")->middleware("auth");
    Route::put("edit-kategori/{slug}",  "update")->middleware("auth");
    Route::get("hapus-kategori/{slug}",  "hapus")->middleware("auth");  
    Route::get("hapuss-kategori/{slug}",  "hapuss")->middleware("auth");
    Route::get("dihapus-kategori",  "hapusss")->middleware("auth");
    Route::get("memulih-kategori/{slug}",  "memulihkan")->middleware("auth");
});
Route::get("pinjam", [pempinjamController::class, "index"])->middleware("auth");
