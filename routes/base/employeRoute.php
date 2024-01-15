<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;



//chaneg the status
Route::post('/employes/changestatus', [EmployeController::class, 'changeStatus'])->name('employes.changestatus');
//to permanently delete
Route::delete('/employes/{id}/force_delete', [EmployeController::class, 'forceDelete'])->name('employes.forceDelete');
// to restore
Route::put('/employes/{id}/restore', [EmployeController::class, 'restore'])->name('employes.restore');
//liste all deleted
Route::get('/employes/trashed', [EmployeController::class, 'trashed'])->name('employes.trashed');
Route::resource('employes', EmployeController::class);


//copy this two lines in web.php

