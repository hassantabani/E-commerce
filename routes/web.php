<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;

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

Route::get("/",[WebsiteController::class , "index"])->name('index');
Route::get("login",[AuthController::class,"login"])->name("login");
Route::get("logout",[AuthController::class,"logout"])->name("logout");
Route::get("register",[AuthController::class,"register"])->name("register");






Route::name("user.")->group(function(){
Route::post("store-user",[AuthController::class, 'store_user'])->name("store-user");
Route::post("store-login",[AuthController::class, 'store_login'])->name("login");

});



Route::name("admin.")->prefix('admin')->group(function(){
    Route::get("/dashboard",[AdminController::class, 'index'])->name("index");
Route::get("Show-User",[AdminController::class, "show_user"])->name("Show-User");
Route::get("Product",[AdminController::class, "product"])->name("product");
Route::post("store-product",[AdminController::class, "store_product"])->name("store-product");
    });
