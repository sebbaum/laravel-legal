<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web routes for displaying the legal ducuments and the editor.
|--------------------------------------------------------------------------
*/
Route::get('/terms-of-service', 'LegalController@tos')->name('tos');

Route::get('/privacy-policy', 'LegalController@pripol')->name('pripol');

Route::get('/imprint', 'LegalController@imprint')->name('imprint');

/*
|--------------------------------------------------------------------------
| Editor routes for editing of legal documents.
|--------------------------------------------------------------------------
|
| For this route a basic authentication is used.
|
| Optionally you can customize the username field by defining:
| ['middleware' => 'auth.legal,<field-name>']
*/
Route::group(['middleware' => 'legal.auth'], function () {
    Route::get('editor', function () {
        return view('legal::editor');
    })->name('editor');
});