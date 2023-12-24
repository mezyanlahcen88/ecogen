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
Route::resource('suppliers', SupplierController::class);




