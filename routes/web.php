<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Operators\DashboardController as OperatorDashboardController;
use App\Http\Controllers\Operators\UserManagementController;
use App\Http\Controllers\Operators\AreaManagementController;
use App\Http\Controllers\Traders\DashboardController as TraderDashboardController;
use App\Http\Controllers\Traders\UserDetailController;

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


Route::view('/home', 'home')->name('home');

Route::middleware(['LoginCheck'])->group(function () {
    Route::get('/trader/dashboard', [TraderDashboardController::class, 'index'])->name('trader.dashboard');
    Route::get('/trader/profile', [UserDetailController::class, 'index'])->name('trader.profile');
});


Route::get('/operator/users', [UserManagementController::class, 'index'])->name('operator.users');

Route::middleware(['LoginCheck'])->group(function () {
    // Dashboard
    Route::get('/operator/dashboard', [OperatorDashboardController::class, 'index'])->name('trader.dashboard');
    // End Dashboard

    // Areas
    Route::get('/operator/areas', [AreaManagementController::class, 'index'])->name('operator.areas');
    Route::get('/operator/area/create', [AreaManagementController::class, 'create'])->name('operator.areas.create');
    Route::post('/operator/area/store', [AreaManagementController::class, 'store'])->name('operator.areas.store');
    Route::get('/operator/area/edit/{areaId}', [AreaManagementController::class, 'edit'])->name('operator.areas.edit');
    Route::post('/operator/area/update/{areaId}', [AreaManagementController::class, 'update'])->name('operator.areas.update');
    Route::post('operator/area/destroy/{areaId}', [AreaManagementController::class, 'destroy'])->name('operator.areas.destroy');
    // End Areas

    // Users
    Route::get('/operator/users', [UserManagementController::class, 'index'])->name('operator.users');
    Route::get('/operator/user/create', [UserManagementController::class, 'create'])->name('operator.users.create');
    Route::post('/operator/user/store', [UserManagementController::class, 'store'])->name('operator.users.store');
    Route::get('/operator/user/edit/{userId}', [UserManagementController::class, 'edit'])->name('operator.users.edit');
    Route::post('/operator/user/update/{userId}', [UserManagementController::class, 'update'])->name('operator.users.update');
    Route::post('operator/user/destroy/{userId}', [UserManagementController::class, 'destroy'])->name('operator.users.destroy');
    // End Users
});