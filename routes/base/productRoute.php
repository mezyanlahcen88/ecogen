<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



//chaneg the status
Route::post('/products/changestatus', [ProductController::class, 'changeStatus'])->name('products.changestatus');
//to permanently delete
Route::delete('/products/{id}/force_delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
// to restore
Route::put('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
//liste all deleted
Route::get('/products/trashed', [ProductController::class, 'trashed'])->name('products.trashed');
Route::get('/get-products-json',[ProductController::class,'getProductsJson'])->name('products.getProductsJson');
Route::get('/products/get-last-price',[ProductController::class,'getLastPrice'])->name('products.getLastPrice');
Route::get('/products/get-product',[ProductController::class,'getProduct'])->name('products.getProduct');

Route::resource('products', ProductController::class);


//copy this two lines in web.php

