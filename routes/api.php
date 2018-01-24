<?php

use Illuminate\Support\Facades\Route;

Route::get('ping', function () {
    return '# PING - PONG: Response from Server';
});