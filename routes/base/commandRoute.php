<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandController;



//chaneg the status
Route::post('/commands/changestatus', [CommandController::class, 'changeStatus'])->name('commands.changestatus');
//to permanently delete
Route::delete('/commands/{id}/force_delete', [CommandController::class, 'forceDelete'])->name('commands.forceDelete');
// to restore
Route::put('/commands/{id}/restore', [CommandController::class, 'restore'])->name('commands.restore');
//liste all deleted
Route::get('/commands/trashed', [CommandController::class, 'trashed'])->name('commands.trashed');
Route::get('/devis/{id}/print_command', [CommandController::class, 'generatePdf'])->name('commands.generatePdf');

Route::resource('commands', CommandController::class);


