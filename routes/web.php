<?php

use App\Livewire\UrlShortener;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;

Route::get('/', [UrlShortenerController::class, 'index'])->name('urlshortener.index');

Route::get('/l/{shortCode}', [UrlShortenerController::class, 'redirect'])->name('urlshortener.short');