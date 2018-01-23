<?php

use Illuminate\Support\Facades\Route;

Route::get('/terms-of-service', function () {
    return view('legal::tos');
})->name('tos');

Route::get('/privacy-policy', function () {
    return view('legal::pripol');
})->name('pripol');

Route::get('/gtc', function () {
    return view('legal::gtc');
})->name('gtc');

Route::get('/imprint', function () {
    return view('legal::imprint');
})->name('imprint');

Route::get('editor', function () {
    return view('legal::editor');
})->name('editor');