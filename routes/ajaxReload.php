<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReloadController;

Route::get('/reload/getMainSupplies', [ReloadController::class, 'getMainSupplies'])->name('reload.getMainSupplies');
Route::get('/reload/countries', [ReloadController::class, 'getCountries'])->name('reload.getCountries');
Route::get('/reload/manufacturers', [ReloadController::class, 'getManufacturers'])->name('reload.getManufacturers');
Route::get('/reload/currencies', [ReloadController::class, 'getCurrencies'])->name('reload.getCurrencies');
Route::get('/reload/paymentMethods', [ReloadController::class, 'getPaymentMethods'])->name('reload.getPaymentMethods');
Route::get('/reload/paymentTerms', [ReloadController::class, 'getPaymentTerms'])->name('reload.getPaymentTerms');
Route::get('/reload/EmailTypes', [ReloadController::class, 'getEmailTypes'])->name('reload.getEmailTypes');
Route::get('/reload/companyGroupes', [ReloadController::class, 'getcompanyGroupes'])->name('reload.getcompanyGroupes');
Route::get('/reload/languages', [ReloadController::class, 'getLanguages'])->name('reload.languages');
Route::get('/reload/categories', [ReloadController::class, 'getCategories'])->name('reload.categories');
Route::get('/reload/suppliers', [ReloadController::class, 'getSuppliers'])->name('reload.suppliers');
Route::get('/reload/conditions', [ReloadController::class, 'getConditions'])->name('reload.conditions');

