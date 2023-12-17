<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailNotifications;

Route::post('email/get-modal-mail', [EmailNotifications::class,'getModalEmail'])->name('email.modal.get');
Route::post('email/send-modal-mail', [EmailNotifications::class,'sendModalEmail'])->name('email.modal.send');
