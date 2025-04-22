<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/', function () {
    return redirect()->route('login');
});

// Protected Routes
Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/equipment/create', [EquipmentController::class, 'create'])->name('equipment.create');
Route::post('/equipment', [EquipmentController::class, 'store'])->name('equipment.store');