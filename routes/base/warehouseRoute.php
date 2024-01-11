<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;



//chaneg the status
Route::post('/warehouses/changestatus', [WarehouseController::class, 'changeStatus'])->name('warehouses.changestatus');
//to permanently delete
Route::delete('/warehouses/{id}/force_delete', [WarehouseController::class, 'forceDelete'])->name('warehouses.forceDelete');
// to restore
Route::put('/warehouses/{id}/restore', [WarehouseController::class, 'restore'])->name('warehouses.restore');
//liste all deleted
Route::get('/warehouses/trashed', [WarehouseController::class, 'trashed'])->name('warehouses.trashed');
Route::resource('warehouses', WarehouseController::class);


//copy this two lines in web.php

