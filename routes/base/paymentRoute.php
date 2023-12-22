<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;



//chaneg the status
Route::post('/payments/changestatus', [PaymentController::class, 'changeStatus'])->name('payments.changestatus');
//to permanently delete
Route::delete('/payments/{id}/force_delete', [PaymentController::class, 'forceDelete'])->name('payments.forceDelete');
// to restore
Route::put('/payments/{id}/restore', [PaymentController::class, 'restore'])->name('payments.restore');
//liste all deleted
Route::get('/payments/trashed', [PaymentController::class, 'trashed'])->name('payments.trashed');
Route::resource('payments', PaymentController::class);



