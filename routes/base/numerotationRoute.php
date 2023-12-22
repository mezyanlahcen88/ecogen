<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumerotationController;



//chaneg the status
Route::post('/numerotations/changestatus', [NumerotationController::class, 'changeStatus'])->name('numerotations.changestatus');
//to permanently delete
Route::delete('/numerotations/{id}/force_delete', [NumerotationController::class, 'forceDelete'])->name('numerotations.forceDelete');
// to restore
Route::put('/numerotations/{id}/restore', [NumerotationController::class, 'restore'])->name('numerotations.restore');
//liste all deleted
Route::get('/numerotations/trashed', [NumerotationController::class, 'trashed'])->name('numerotations.trashed');
Route::resource('numerotations', NumerotationController::class);



