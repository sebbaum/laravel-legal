<?php

use Illuminate\Support\Facades\Route;

Route::get('/terms-of-service', function () {
    return view('legal::tos');
})->name('tos');

Route::get('/privacy-policy', function () {
    return view('legal::pripol');
})->name('pripol');