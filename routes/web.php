<?php

use Illuminate\Support\Facades\Route;

// Health check route for Railway deployment
Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'timestamp' => now()]);
});

Route::get('/', function () {
    return view('welcome');
});
