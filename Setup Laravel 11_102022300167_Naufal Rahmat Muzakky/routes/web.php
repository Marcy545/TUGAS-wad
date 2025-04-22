<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
