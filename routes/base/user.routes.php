
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

 ############################### UserController ###############################

        Route::post('/users/changestatus', [UserController::class, 'changeStatus'])->name('users.changestatus');
        Route::delete('/users/{id}/force_delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
        Route::put('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::get('/users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
        Route::resource('/users', UserController::class);
