<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReglementController;



//chaneg the status
Route::post('/reglements/changestatus', [ReglementController::class, 'changeStatus'])->name('reglements.changestatus');
//to permanently delete
Route::delete('/reglements/{id}/force_delete', [ReglementController::class, 'forceDelete'])->name('reglements.forceDelete');
// to restore
Route::put('/reglements/{id}/restore', [ReglementController::class, 'restore'])->name('reglements.restore');
//liste all deleted
Route::get('/reglements/trashed', [ReglementController::class, 'trashed'])->name('reglements.trashed');
Route::resource('reglements', ReglementController::class);


//copy this two lines in web.php

