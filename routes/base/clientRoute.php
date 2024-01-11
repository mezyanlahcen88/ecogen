<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;



//chaneg the status
Route::post('/clients/changestatus', [ClientController::class, 'changeStatus'])->name('clients.changestatus');
//to permanently delete
Route::delete('/clients/{id}/force_delete', [ClientController::class, 'forceDelete'])->name('clients.forceDelete');
// to restore
Route::put('/clients/{id}/restore', [ClientController::class, 'restore'])->name('clients.restore');
//liste all deleted
Route::get('/clients/trashed', [ClientController::class, 'trashed'])->name('clients.trashed');
Route::get('/clients/{id}/create-garanty', [ClientController::class, 'createGaranty'])->name('clients.createGaranty');
Route::post('/clients/store-garanty', [ClientController::class, 'storeGaranty'])->name('clients.storeGaranty');
Route::get('/clients/{id}/garanties/{garanty}/edit-garanty', [ClientController::class, 'editGaranty'])->name('clients.editGaranty');
Route::post('/clients/{id}/garanties/{garanty}/update-garanty', [ClientController::class, 'editGaranty'])->name('clients.updateGaranty');
Route::resource('clients', ClientController::class);


//copy this two lines in web.php

