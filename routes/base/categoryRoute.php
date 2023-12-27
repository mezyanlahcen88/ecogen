<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



//chaneg the status
Route::post('/categories/changestatus', [CategoryController::class, 'changeStatus'])->name('categories.changestatus');
//to permanently delete
Route::delete('/categories/{id}/force_delete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
// to restore
Route::put('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
//liste all deleted
Route::get('/categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
Route::get('/categories/{id}/sub-categories', [CategoryController::class, 'getSubCategories'])->name('categories.getSubCategories');
Route::resource('categories', CategoryController::class);


//copy this two lines in web.php

