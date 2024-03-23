<?php

use Illuminate\Support\Facades\Route;

// Language switcher
Route::get('lang/{locale?}', function ($locale) {
    app()->setLocale($locale);
    \Session::put('web_lang', $locale);
    return url('/');
})->name('locale.set');
