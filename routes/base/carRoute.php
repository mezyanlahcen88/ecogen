<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;



//chaneg the status
Route::post('/cars/changestatus', [CarController::class, 'changeStatus'])->name('cars.changestatus');
//to permanently delete
Route::delete('/cars/{id}/force_delete', [CarController::class, 'forceDelete'])->name('cars.forceDelete');
// to restore
Route::put('/cars/{id}/restore', [CarController::class, 'restore'])->name('cars.restore');
//liste all deleted
Route::get('/cars/trashed', [CarController::class, 'trashed'])->name('cars.trashed');
Route::get('/cars/{id}/create-document', [CarController::class, 'createDocument'])->name('cars.createDocument');
Route::post('/cars/store-document', [CarController::class, 'storeDocument'])->name('cars.storeDocument');
Route::resource('cars', CarController::class);

