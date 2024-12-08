<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;

Route::get('/', [PointController::class, 'index']);
Route::post('/inputStasiun', [PointController::class, 'store'])->name('inputStasiun');
Route::get('/outputStasiun', [PointController::class, 'seeOutput'])->name('outputStasiun');