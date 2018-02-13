<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web routes for displaying the legal ducuments and the editor.
|--------------------------------------------------------------------------
*/
Route::get('/terms-of-service', 'LegalController@tos')->name('legal.tos');

Route::get('/privacy-policy', 'LegalController@pripol')->name('legal.pripol');

Route::get('/imprint', 'LegalController@imprint')->name('legal.imprint');

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
Route::group(['middleware' => ['auth.basic:legal', 'checkForcedPasswordReset']], function () {
    Route::get('editor', function () {
        return view('legal::editor');
    })->name('legal.editor');
});

/*
|--------------------------------------------------------------------------
| Password reset routes for lawyers
|--------------------------------------------------------------------------
|
| Lawyers are forced to reset their password when they login for the first
| time.
*/
Route::get('/password-reset', function () {
    return view('legal::resetPassword');
})->name('legal.passwordReset');

Route::post('/password-reset', function () {
    // TODO: implement Controller and Action
    dd(request());
})->name('legal.storeNewPassword');