<?php

use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Models\Grade;
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
})->middleware('auth');

Route::group(["prefix" => "/student"], function(){
    Route::get("all", [StudentsController::class, "index"]);
    Route::get("/detail/{student}", [StudentsController::class, "show"]);
    Route::get("create", [StudentsController::class, "create"])->middleware('auth');
    Route::post("add", [StudentsController::class, "store"])->middleware('auth');
    Route::delete('/destroy/{student}', [StudentsController::class, 'destroy'])->middleware('auth');
    Route::get('/edit/{student}', [StudentsController::class, 'edit'])->middleware('auth');
    Route::put('/update/{student}', [StudentsController::class, 'update'])->middleware('auth');
});

Route::get('/grade', [GradesController::class, 'index'])->middleware('auth');

Route::get("/login", [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post("/login", [LoginController::class, "auth"]);
Route::post("/logout", [LoginController::class, "logout"]);

Route::get("/register", [RegisterController::class, "index"])->middleware('guest');
Route::post("/register", [RegisterController::class, "store"]);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        "title" => "dashboard",
    ]);
});

Route::apiResource('/dashboard/student', ControllersDashboardController::class);

Route::get('/dashboard/grade', function(){
    return view('dashboard.grade.index', [
        "title" => "dashboard",
        'grades' => Grade::all()
    ]);
});
