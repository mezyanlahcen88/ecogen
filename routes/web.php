<?php

use App\Models\Rate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CardDetailsController;
use App\Http\Controllers\PickupDeliveryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes();
Auth::routes(['register' => false]);

Route::get(env('ADMIN_PREFIX'), function () {
    return view('security.auth.login');
});

Route::get('/pass', function () {
    return bcrypt('azerty123');
});
Route::get('/incdevis', function () {
    // return checkExpirationDate('2024-12-25');
    incDevisNumerotation();
});
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/region/{id}', [LocationController::class, 'getVilles'])->name('location.villes');
Route::get('/ville/{id}', [LocationController::class, 'getSecteurs'])->name('location.secteurs');
// Route::group(['prefix' => env('ADMIN_PREFIX').'/'.App::getLocale(),  'middleware' => 'auth'], function()
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    ############################### RoleController ###############################
    Route::resource('roles', RoleController::class);

    ##LOCALISATIONS

    ############################### systemLanguages ###############################
    Route::prefix('/')->group(__DIR__ . '/base/systemeLanguage.routes.php');

    ############################### languagetransations ###############################
    Route::prefix('/')->group(__DIR__ . '/base/langTranslation.routes.php');

    ############################### UserController ###############################
    Route::prefix('/')->group(__DIR__ . '/base/user.routes.php');

    ############################### setting ###############################
    require __DIR__ . '/base/settingRoute.php';
    ############################### Car ###############################
    require __DIR__ . '/base/carRoute.php';
    ############################### Category ###############################
    require __DIR__ . '/base/categoryRoute.php';
    ############################### Driver ###############################
    require __DIR__ . '/base/driverRoute.php';
    ############################### Client ###############################
    require __DIR__ . '/base/clientRoute.php';
    ############################### Brand ###############################
    require __DIR__ . '/base/brandRoute.php';
    ############################### Numerotation ###############################
    require __DIR__ . '/base/numerotationRoute.php';
    ############################### Exercice ###############################
    require __DIR__ . '/base/exerciceRoute.php';
    ############################### Payment ###############################
    require __DIR__ . '/base/paymentRoute.php';
    ############################### Supplier ###############################
    require __DIR__ . '/base/supplierRoute.php';
    ############################### Employe ###############################
    require __DIR__ . '/base/employeRoute.php';
    ############################### Warehouse ###############################
    require __DIR__ . '/base/warehouseRoute.php';
    ############################### Product ###############################
    require __DIR__ . '/base/productRoute.php';
    ############################### Devis ###############################
    require __DIR__ . '/base/devisRoute.php';
    require __DIR__ . '/base/carDocumentRoute.php';
    ############################### Garanty ###############################
    require __DIR__ . '/base/garantyRoute.php';
    ############################### Command ###############################
require __DIR__ . '/base/commandRoute.php';
############################### Reglement ###############################
require __DIR__ . '/base/reglementRoute.php';
    ############################### ReloadController ###############################
    Route::prefix('/')->group(__DIR__ . '/base/reload.routes.php');
});
