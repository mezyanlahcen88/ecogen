<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevisController;



//chaneg the status
Route::post('/devis/changestatus', [DevisController::class, 'changeStatus'])->name('devis.changestatus');
//to permanently delete
Route::delete('/devis/{id}/force_delete', [DevisController::class, 'forceDelete'])->name('devis.forceDelete');
// to restore
Route::put('/devis/{id}/restore', [DevisController::class, 'restore'])->name('devis.restore');
//liste all deleted
Route::get('/devis/trashed', [DevisController::class, 'trashed'])->name('devis.trashed');
Route::get('/devis/{id}/view-devis-invoice', [DevisController::class, 'ViewDevisInvoice'])->name('devis.ViewDevisInvoice');
Route::get('/devis/{id}/print-devis-invoice', [DevisController::class, 'printDevisInvoice'])->name('devis.printDevisInvoice');
Route::resource('devis', DevisController::class);




