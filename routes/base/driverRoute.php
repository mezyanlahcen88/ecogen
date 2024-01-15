<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;



//chaneg the status
Route::post('/drivers/changestatus', [DriverController::class, 'changeStatus'])->name('drivers.changestatus');
//to permanently delete
Route::delete('/drivers/{id}/force_delete', [DriverController::class, 'forceDelete'])->name('drivers.forceDelete');
// to restore
Route::put('/drivers/{id}/restore', [DriverController::class, 'restore'])->name('drivers.restore');
//liste all deleted
Route::get('/drivers/trashed', [DriverController::class, 'trashed'])->name('drivers.trashed');
Route::resource('drivers', DriverController::class);




