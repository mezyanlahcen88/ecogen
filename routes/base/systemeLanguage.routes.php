
<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LanguageController;

    ############################### systemLanguages ###############################
    Route::post('/systemLanguages/changedefault', [LanguageController::class, 'changeDefault'])->name('systemLanguages.changedefault');
    Route::get('/systemLanguages/{id}/translations', [LanguageController::class, 'translations'])->name('systemLanguages.translations');
    Route::get('/systemLanguages/{id}/filterByKeyWord', [LanguageController::class, 'filterByKeyWord'])->name('systemLanguages.filterByKeyWord');
    Route::get('/systemLanguages/manage_languages', [LanguageController::class, 'manageLanguage'])->name('systemLanguages.manageLanguage');
    Route::resource('systemLanguages', LanguageController::class)->except('store');
    Route::post('/systemLanguages/changestatus', [LanguageController::class, 'changeStatus'])->name('systemLanguages.changestatus');
