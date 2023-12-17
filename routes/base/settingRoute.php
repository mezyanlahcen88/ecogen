<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;


 ############################### SettingController ###############################

 Route::resource('settings', SettingController::class);
