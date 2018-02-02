<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API routes for the legal management UI
|--------------------------------------------------------------------------
|
| These routes use a basic authentication.
|
*/
Route::group(['middleware' => 'legal.auth'], function () {
    /**
     * Store the document.
     */
    Route::post('documents', 'EditorController@store');

    /**
     * Fetch the document
     */
    Route::get('documents/{type}', 'EditorController@fetchLatest');
});
