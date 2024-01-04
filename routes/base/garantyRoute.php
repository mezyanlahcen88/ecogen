<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GarantyController;



//chaneg the status
Route::post('/garanties/changestatus', [GarantyController::class, 'changeStatus'])->name('garanties.changestatus');
//to permanently delete
Route::delete('/garanties/{id}/force_delete', [GarantyController::class, 'forceDelete'])->name('garanties.forceDelete');
// to restore
Route::put('/garanties/{id}/restore', [GarantyController::class, 'restore'])->name('garanties.restore');
//liste all deleted
Route::get('/garanties/trashed', [GarantyController::class, 'trashed'])->name('garanties.trashed');
Route::resource('garanties', GarantyController::class);




