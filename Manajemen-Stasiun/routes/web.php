<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;
use App\Http\Controllers\loginController;

Route::get('login', [loginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('admin.logout');

Route::get('/', [PointController::class, 'index']);
Route::post('/inputStasiun', [PointController::class, 'store'])->name('inputStasiun');
Route::get('/outputStasiun', [PointController::class, 'seeOutput'])->name('outputStasiun');