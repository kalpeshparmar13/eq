<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmergencyQuotaRequestController;
use App\Http\Controllers\EmergencyQuotaApproveController;
use App\Http\Controllers\StationController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/eqrequest', [EmergencyQuotaRequestController::class, 'index'])->name('eqrequest.index');
    Route::get('/eqrequest/create', [EmergencyQuotaRequestController::class, 'create'])->name('eqrequest.create');
    Route::post('/eqrequest', [EmergencyQuotaRequestController::class, 'store'])->name('eqrequest.store');
    Route::get('/eqrequest/{id}', [EmergencyQuotaRequestController::class, 'show'])->name('eqrequest.show');
    Route::get('/eqrequest/{id}/edit', [EmergencyQuotaRequestController::class, 'edit'])->name('eqrequest.edit');
    Route::put('/eqrequest/{id}', [EmergencyQuotaRequestController::class, 'update'])->name('eqrequest.update');
    Route::delete('/eqrequest/{id}', [EmergencyQuotaRequestController::class, 'destroy'])->name('eqrequest.destroy');
    Route::post('/eqrequest/forward', [EmergencyQuotaRequestController::class, 'forward'])->name('eqrequest.forward');
    Route::post('/eqrequest/pullback', [EmergencyQuotaRequestController::class, 'pullback'])->name('eqrequest.pullback');
    Route::post('/eqrequest/approve', [EmergencyQuotaRequestController::class, 'approve'])->name('eqrequest.approve');
    Route::get('/eqrequest/{id}/print', [EmergencyQuotaRequestController::class, 'print'])->name('eqrequest.print');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/eqapprove', [EmergencyQuotaApproveController::class, 'index'])->name('eqapprove.index');
    Route::get('/eqapprove/{id}', [EmergencyQuotaApproveController::class, 'show'])->name('eqapprove.show');
    Route::post('/eqapprove/approve', [EmergencyQuotaApproveController::class, 'approve'])->name('eqapprove.approve');
});

Route::get('/autocomplete', [StationController::class, 'autocomplete'])->name('autocomplete');
?>