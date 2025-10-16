<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DashboardController;


// login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// hanya bisa diakses kalau login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('cekLogin')
    ->name('dashboard');



// ===============================DOSEN CONTROLLER================================
// daftar dosen
Route::get('/dosen', [DosenController::class, 'index'])
    ->middleware('cekLogin')
    ->name('dosen');

// tambah dosen
Route::get('/dosen/create', [DosenController::class, 'create']);
Route::post('/dosen/store', [DosenController::class, 'store']);

// edit dosen
Route::get('/dosen/edit/{nidn}', [DosenController::class, 'edit']);
Route::post('/dosen/update/{nidn}', [DosenController::class, 'update']);

// hapus dosen
Route::get('/dosen/delete/{nidn}', [DosenController::class, 'destroy']);

