<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);

// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'registerProcess']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/trader/login', [UserAuthController::class, 'index']);
Route::post('/trader/login', [UserAuthController::class, 'loginProcess'])->name('trader.login.process');;


// Route::get('/register/users', [UserAuthController::class, 'register']);
// Route::post('/register/users', [UserAuthController::class, 'registerProcess']);
// Route::get('/logout', [UserAuthController::class, 'logout']);