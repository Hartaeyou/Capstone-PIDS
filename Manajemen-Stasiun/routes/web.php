<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\PointController;

Route::get('/', [PointController::class, 'index']);
Route::post('/inputStasiun', [PointController::class, 'store'])->name('inputStasiun');
Route::get('/outputStasiun', [PointController::class, 'show'])->name('outputStasiun');
Route::get('/formUpdateStasiun/{id}', [PointController::class, 'formUpdateStasiun'])->name('formUpdateStasiun');
Route::post('/updateStasiun/{id}', [PointController::class, 'edit'])->name('updateStasiun');
Route::post('/deleteStasiun/{id}', [PointController::class, 'destroy'])->name('deleteStasiun');

// Rute
Route::get('/rute', [RuteController::class, 'index'])->name('rute.index');
Route::post('/rute/store', [RuteController::class,'store'])->name('rute.store');
Route::get('/formCreateRute', [RuteController::class, 'formCreate'])->name('formCreateRute');
Route::get('/rute/detail/{id}', [RuteController::class, 'showDetail'])->name('rute.detail');
Route::get('/rute/EditPage/{id}', [RuteController::class, 'edit'])->name('rute.editPage');
Route::post('/rute/update/{id}', [RuteController::class, 'update'])->name('rute.update'); 