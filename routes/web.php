    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Operators\DashboardController as OperatorDashboardController;
use App\Http\Controllers\Operators\UserManagementController;
use App\Http\Controllers\Operators\AreaManagementController;
use App\Http\Controllers\Operators\LocationManagementController;
use App\Http\Controllers\Operators\SubmissionManagementController as OperatorSubmissionController;

use App\Http\Controllers\Traders\DashboardController as TraderDashboardController;
use App\Http\Controllers\Traders\UserDetailController;
use App\Http\Controllers\Traders\UserBusinessController;
use App\Http\Controllers\Traders\SubmissionController;

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
    return view('home');
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

    Route::get('/trader/business', [UserBusinessController::class, 'index'])->name('trader.business');
    Route::get('/trader/business/create', [UserBusinessController::class, 'create'])->name('trader.business.create');
    Route::post('/trader/business/store', [UserBusinessController::class, 'store'])->name('trader.business.store');
    Route::get('/trader/business/edit/{id}', [UserBusinessController::class, 'edit'])->name('trader.business.edit');
    Route::post('/trader/business/update/{id}', [UserBusinessController::class, 'update'])->name('trader.business.update');
    Route::post('/trader/business/destroy/{id}', [UserBusinessController::class, 'destroy'])->name('trader.business.destroy');
   
    Route::get('/trader/submissions', [SubmissionController::class, 'index'])->name('trader.submission');
    Route::get('/trader/submission/create', [SubmissionController::class, 'create'])->name('trader.submission.create');
    Route::post('/trader/submission/store', [SubmissionController::class, 'store'])->name('trader.submission.store');
    Route::get('/trader/submission/edit/{id}', [SubmissionController::class, 'edit'])->name('trader.submission.edit');
    Route::post('/trader/submission/update/{id}', [SubmissionController::class, 'update'])->name('trader.submission.update');
    Route::post('/trader/submission/destroy/{id}', [SubmissionController::class, 'destroy'])->name('trader.submission.destroy');
    Route::get('/trader/submission/detail/{id}', [SubmissionController::class, 'detail'])->name('trader.submission.detail');
});

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

    // Locations
   
    Route::get('/operator/locations', [LocationManagementController::class, 'index'])->name('operator.locations');
    Route::get('/operator/location/create', [LocationManagementController::class, 'create'])->name('operator.locations.create');
    Route::post('/operator/location/store', [LocationManagementController::class, 'store'])->name('operator.locations.store');
    Route::get('/operator/location/edit/{locationId}', [LocationManagementController::class, 'edit'])->name('operator.locations.edit');
    Route::post('/operator/location/update/{locationId}', [LocationManagementController::class, 'update'])->name('operator.locations.update');
    Route::post('operator/location/destroy/{locationId}', [LocationManagementController::class, 'destroy'])->name('operator.locations.destroy');
    // End Locations

    // Submissions
    Route::get('/operator/submissions', [OperatorSubmissionController::class, 'index'])->name('operator.submissions');
    Route::get('/operator/submission/create', [OperatorSubmissionController::class, 'create'])->name('operator.submission.create');
    Route::post('/operator/submission/{submissionId}/approve', [OperatorSubmissionController::class, 'approveSubmission'])->name('operator.submission.approve');
    Route::post('/operator/submission/{submissionId}/reject', [OperatorSubmissionController::class, 'rejectSubmission'])->name('operator.submission.reject');
    // End Submissions
});

// otheR
Route::get('/pages/locations', [LocationManagementController::class, 'showAllLocation'])->name('location');
Route::get('/api/locations', [LocationManagementController::class, 'getAll'])->name('api.locations');

Route::get('/submission/print/{id}', [SubmissionController::class, 'printPdf'])->name('printPdf');