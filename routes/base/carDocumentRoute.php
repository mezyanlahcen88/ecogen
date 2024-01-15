<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarDocumentsController;



//chaneg the status
Route::post('/car-documents/changestatus', [CarDocumentsController::class, 'changeStatus'])->name('car-documents.changestatus');
//to permanently delete
Route::delete('/car-documents/{id}/force_delete', [CarDocumentsController::class, 'forceDelete'])->name('car-documents.forceDelete');
// to restore
Route::put('/car-documents/{id}/restore', [CarDocumentsController::class, 'restore'])->name('car-documents.restore');
//liste all deleted
Route::get('/car-documents/trashed', [CarDocumentsController::class, 'trashed'])->name('car-documents.trashed');
Route::get('/car-documents/{id}/create-document', [CarDocumentsController::class, 'createDocument'])->name('car-documents.createDocument');
Route::post('/car-documents/store-document', [CarDocumentsController::class, 'storeDocument'])->name('car-documents.storeDocument');
Route::resource('car-documents', CarDocumentsController::class);

