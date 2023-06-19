<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\pempinjamController;
use App\Http\Controllers\PinjamBukuCoontroller;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, "index"]);
Route::controller(AuthController::class)->group(function () {
    Route::get("login", "login")->name("login")->middleware("guestt");
    Route::post("login", "authenticating")->middleware("guestt");
    Route::get("logout", "logout")->middleware("auth");
    Route::get("register", "register")->middleware("guestt");
    Route::post("register", "registerproses")->middleware("guestt");
});
Route::get("dashboard", [DashboardController::class, "index"])->middleware(["auth", "admin"]);
Route::get("profile", [UserController::class, "profile"])->middleware(["auth", "client"]);
Route::controller(UserController::class)->group(function () {
    Route::get("user", "user")->middleware(["auth", "admin"]);
    Route::get("regigteruser", "register")->middleware(["auth", "admin"]);
    Route::get("user-detail/{slug}", "detail")->middleware(["auth", "admin"]);
    Route::get("user-approve/{slug}", "menyetujui")->middleware(["auth", "admin"]);
    Route::get("user-buruk/{slug}", "delete")->middleware(["auth", "admin"]);
    Route::get("user-hapus/{slug}", "hapus")->middleware(["auth", "admin"]);
    Route::get("dihapus-user", "lihat")->middleware(["auth", "admin"]);
    Route::get("memulih-user/{slug}", "memulihkan")->middleware(["auth", "admin"]);
});
Route::controller(BookController::class)->group(function () {
    Route::get("books", "index")->middleware(["auth", "admin"]);
    Route::get("tambah-buku", "tambah")->middleware(["auth", "admin"]);
    Route::post("tambah-buku", "store")->middleware(["auth", "admin"]);
    Route::get("edit-buku/{slug}", "edit")->middleware(["auth", "admin"]);
    Route::post("edit-buku/{slug}", "update")->middleware(["auth", "admin"]);
    Route::get("hapus-buku/{slug}", "hapus")->middleware(["auth", "admin"]);
    Route::get("hapuss-buku/{slug}", "hapuss")->middleware(["auth", "admin"]);
    Route::get("dihapus-buku", "hapusss")->middleware(["auth", "admin"]);
    Route::get("memulih-buku/{slug}", "memulihkan")->middleware(["auth", "admin"]);
});
Route::controller(kategoriController::class)->group(function () {
    Route::get("kategori",  "index")->middleware(["auth", "admin"]);
    Route::get("tambah-kategori",  "tambah")->middleware(["auth", "admin"]);
    Route::post("tambah-kategori",  "store")->middleware(["auth", "admin"]);
    Route::get("edit-kategori/{slug}",  "edit")->middleware(["auth", "admin"]);
    Route::put("edit-kategori/{slug}",  "update")->middleware(["auth", "admin"]);
    Route::get("hapus-kategori/{slug}",  "hapus")->middleware(["auth", "admin"]);
    Route::get("hapuss-kategori/{slug}",  "hapuss")->middleware(["auth", "admin"]);
    Route::get("dihapus-kategori",  "hapusss")->middleware(["auth", "admin"]);
    Route::get("memulih-kategori/{slug}",  "memulihkan")->middleware(["auth", "admin"]);
});
Route::controller(PinjamBukuCoontroller::class)->group(function () {
    Route::get("pinjambuku", "index")->middleware(["auth", "admin"]);
    Route::post("pinjambuku", "store")->middleware(["auth", "admin"]);
    Route::get("pengembalianbuku", "pengembalianbuku")->middleware(["auth", "admin"]);
    Route::post("pengembalianbuku", "store2")->middleware(["auth", "admin"]);
});
Route::get("pinjam", [pempinjamController::class, "index"])->middleware(["auth", "admin"]);
