<?php

declare(strict_types=1);

use App\Http\Controllers\Quotes\QuoteController;
use Illuminate\Support\Facades\Route;


Route::prefix('quotes')->group(function () {
    Route::get('random', [QuoteController::class, 'random']);
    Route::get('parse', [QuoteController::class, 'parse']);
});
