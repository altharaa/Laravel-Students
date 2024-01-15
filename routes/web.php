<?php

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
        // "nama" => "Asyella Veratia",
        // "kelas" => "11 PPLG 2",
        // "foto" => "public/img/profile.png"
    ]);
});

Route::group(["prefix" => "/student"], function(){
    Route::get("all", [StudentsController::class, "index"]);
    Route::get("/detail/{student}", [StudentsController::class, "show"]);
    Route::get("create", [StudentsController::class, "create"]);
    Route::post("add", [StudentsController::class, "store"]);
});

