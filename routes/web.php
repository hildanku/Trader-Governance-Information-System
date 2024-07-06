<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Operators\DashboardController;

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
Route::get('/operator/login', [AuthController::class, 'index'])->name('login');
Route::post('/operator/login', [AuthController::class, 'loginProcess']);

// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'registerProcess']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/trader/login', [UserAuthController::class, 'index'])->name('trader.login');
Route::post('/trader/login', [UserAuthController::class, 'loginProcess'])->name('trader.login.process');;

Route::get('/trader/register', [UserAuthController::class, 'register'])->name('trader.register');
Route::post('/trader/register', [UserAuthController::class, 'registerProcess'])->name('trader.register.process');

Route::get('/operator/dashboard', [DashboardController::class, 'index'])->name('trader.dashboard');