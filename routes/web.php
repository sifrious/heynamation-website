<?php

use Illuminate\Support\Facades\Route;

// This read-only page does not need sessions or cookies.
Route::view('/', 'company')->withoutMiddleware('web')->name('home');
