<?php

use App\Http\Controllers\SolutionController;
use App\Http\Controllers\Auth_staff\LoginStaffController;
use App\Http\Controllers\Auth_staff\RegisterStaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('guest')->group(function() {
    Route::get('/loginStaff', [LoginStaffController::class, 'create'])->name('login.staff');
    Route::post('/test', [LoginStaffController::class, 'store'])->name('staff.auth');
    Route::get('/registerStaff', [RegisterStaffController::class, 'create'])->name('login.staff');
    Route::post('/registerStaff', [RegisterStaffController::class, 'store']);
});

Route::post('/logoutStaff', [LoginStaffController::class, 'staffOut'])->name('staff.logout');
Route::middleware('auth.staff')->group(function() {
    Route::get('/staffBoard', [SolutionController::class, 'index'])->name('staffBoard.index');
    Route::get('/staffBoard/add/{id}', [SolutionController::class, 'create'])->name('staffBoard.create');
    Route::post('/staffBoard/add', [SolutionController::class, 'store'])->name('staffBoard.store');
    Route::get('/jobBoard', [SolutionController::class, 'index'])->name('staffBoard.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/report', [ReportingController::class, 'index'])->name('report.home');
    Route::get('/reportku', [ReportingController::class, 'myReport'])->name('report.me');
    Route::get('/report/add', [ReportingController::class, 'create'])->name('report.create');
    Route::get('/report/edit/{id}', [ReportingController::class, 'edit'])->name('report.edit');
    Route::post('/report/edit', [ReportingController::class, 'update'])->name('report.update');
    Route::post('/report/add', [ReportingController::class, 'store'])->name('report.store');
});

require __DIR__.'/auth.php';
