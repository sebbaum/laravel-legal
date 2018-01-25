<?php

use Illuminate\Support\Facades\Route;

Route::get('/terms-of-service', 'LegalController@tos')->name('tos');

Route::get('/privacy-policy', 'LegalController@pripol')->name('pripol');

Route::get('/imprint', 'LegalController@imprint')->name('imprint');

Route::get('editor', function () {
    return view('legal::editor');
})->name('editor');