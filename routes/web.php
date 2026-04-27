<?php

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact.index');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
