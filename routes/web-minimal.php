<?php

use Illuminate\Support\Facades\Route;

// Ultra minimal routes for testing cache
Route::get('/', function () {
    return 'Hello World';
})->name('home');

Route::get('test', function () {
    return 'Test';
})->name('test');
