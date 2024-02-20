<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function(){
    return view('about', [
        "title" => "About",
    ]);
});

Route::group(["prefix" => "/student"], function(){
    Route::get("all", [StudentsController::class, "index"]);
    Route::get("/detail/{student}", [StudentsController::class, "show"]);
    Route::get("create", [StudentsController::class, "create"]);
    Route::post("add", [StudentsController::class, "store"]);
    Route::delete('/destroy/{student}', [StudentsController::class, 'destroy']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::put('/update/{student}', [StudentsController::class, 'update']);
});

Route::get("/login", [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post("/login", [LoginController::class, "auth"]);
Route::post("/logout", [LoginController::class, "logout"]);

Route::get("/register", [RegisterController::class, "index"])->middleware('guest');
Route::post("/register", [RegisterController::class, "store"]);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');