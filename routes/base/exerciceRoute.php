<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciceController;



//chaneg the status
Route::post('/exercices/changestatus', [ExerciceController::class, 'changeStatus'])->name('exercices.changestatus');
//to permanently delete
Route::delete('/exercices/{id}/force_delete', [ExerciceController::class, 'forceDelete'])->name('exercices.forceDelete');
// to restore
Route::put('/exercices/{id}/restore', [ExerciceController::class, 'restore'])->name('exercices.restore');
//liste all deleted
Route::get('/exercices/trashed', [ExerciceController::class, 'trashed'])->name('exercices.trashed');
Route::resource('exercices', ExerciceController::class);




