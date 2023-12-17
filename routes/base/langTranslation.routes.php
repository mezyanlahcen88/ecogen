
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageTranslateController;

 ############################### languagetransations ###############################
    Route::get('languagetranslations/filterbylabel', [LanguageTranslateController::class, 'filterByLabel'])->name('languagetranslations.filterbylabel');
    Route::post('languagetranslations/sync', [LanguageTranslateController::class, 'sync'])->name('languagetranslations.sync');
    Route::resource('languagetranslations', LanguageTranslateController::class);
    Route::post('languagetranslations/translate', [LanguageTranslateController::class, 'translate'])->name('languagetranslations.translate');
