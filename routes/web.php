<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-cache', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        return 'Cache Cleared!';
    } catch (\Exception $e) {
        return 'Error clearing cache: ' . $e->getMessage();
    }
});
