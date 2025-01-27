<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Quotes\QuoteController;


Route::prefix('quotes')->group(function (): void {
    Route::get('random', [QuoteController::class, 'random']);
    Route::get('parse', [QuoteController::class, 'parse']);
});

Route::prefix('auth')->group(function (): void {
    // phpinfo();
    Route::post('login', [LoginController::class, '__invoke']);
});
