<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;



//chaneg the status
Route::post('/suppliers/changestatus', [SupplierController::class, 'changeStatus'])->name('suppliers.changestatus');
//to permanently delete
Route::delete('/suppliers/{id}/force_delete', [SupplierController::class, 'forceDelete'])->name('suppliers.forceDelete');
// to restore
Route::put('/suppliers/{id}/restore', [SupplierController::class, 'restore'])->name('suppliers.restore');
//liste all deleted
Route::get('/suppliers/trashed', [SupplierController::class, 'trashed'])->name('suppliers.trashed');
Route::get('/suppliers/{id}/create-garanty', [SupplierController::class, 'createGaranty'])->name('suppliers.createGaranty');
Route::post('/suppliers/store-garanty', [SupplierController::class, 'storeGaranty'])->name('suppliers.storeGaranty');
Route::get('/suppliers/{id}/garanties/{garanty}/edit-garanty', [SupplierController::class, 'editGaranty'])->name('suppliers.editGaranty');
Route::post('/suppliers/{id}/garanties/{garanty}/update-garanty', [SupplierController::class, 'editGaranty'])->name('suppliers.updateGaranty');
Route::resource('suppliers', SupplierController::class);




