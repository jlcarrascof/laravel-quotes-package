<?php
use Illuminate\Support\Facades\Route;
use Jjmartinezf\Quotes\Controllers\QuotesController;

Route::prefix('api/quotes')->group(function () {
    Route::get('/', [QuotesController::class, 'index'])->name('quotes.all');
    Route::get('/random', [QuotesController::class, 'random'])->name('quotes.random');
    Route::get('/{id}', [QuotesController::class, 'show'])->name('quotes.show');
});
