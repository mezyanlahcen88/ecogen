<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;



//chaneg the status
Route::post('/brands/changestatus', [BrandController::class, 'changeStatus'])->name('brands.changestatus');
//to permanently delete
Route::delete('/brands/{id}/force_delete', [BrandController::class, 'forceDelete'])->name('brands.forceDelete');
// to restore
Route::put('/brands/{id}/restore', [BrandController::class, 'restore'])->name('brands.restore');
//liste all deleted
Route::get('/brands/trashed', [BrandController::class, 'trashed'])->name('brands.trashed');
Route::resource('brands', BrandController::class);




