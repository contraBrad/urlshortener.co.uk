<?php

use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UrlShortenerController::class, 'index'])->name('urlshortener.index');
Route::post('/shorten', [UrlShortenerController::class, 'store'])->name('urlshortener.store');
Route::get('/l/{shortCode}', [UrlShortenerController::class, 'redirect']);
