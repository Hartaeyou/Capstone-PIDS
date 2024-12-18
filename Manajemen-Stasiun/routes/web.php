<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\KeretaController;

Route::get('/', [PointController::class, 'index']);
Route::post('/inputStasiun', [PointController::class, 'store'])->name('inputStasiun');
Route::get('/formInputStasiun', [PointController::class, 'show'])->name('formInputStasiun');
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
Route::get('/rute/delete/{id}', [RuteController::class, 'destroy'])->name('rute.delete');

// Kereta
Route::get('/kereta', [KeretaController::class, 'index'])->name('kereta.index');
Route::post('/kereta/store', [KeretaController::class,'store'])->name('kereta.store');
Route::get('/formCreateKereta', [KeretaController::class, 'create'])->name('formCreateKereta');
Route::get('/kereta/edit/{id}', [KeretaController::class, 'formEdit'])->name('kereta.edit');
Route::post('/kereta/update/{id}', [KeretaController::class, 'update'])->name('kereta.update'); 
Route::get('/kereta/delete/{id}', [KeretaController::class, 'destroy'])->name('kereta.delete');