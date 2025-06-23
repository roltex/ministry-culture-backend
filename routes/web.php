<?php

use Illuminate\Support\Facades\Route;

// Simple test route - no database or complex features
Route::get('/test', function () {
    return 'Hello World! Laravel is working.';
});

// Simple health check route for Railway deployment - no database access
Route::get('/health', function () {
    try {
        return response()->json([
            'status' => 'ok',
            'timestamp' => now()->toISOString(),
            'environment' => app()->environment(),
            'version' => '1.0.0'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
            'timestamp' => now()->toISOString()
        ], 500);
    }
});

// Additional debug route
Route::get('/debug', function () {
    return response()->json([
        'php_version' => PHP_VERSION,
        'laravel_version' => app()->version(),
        'environment' => app()->environment(),
        'debug' => config('app.debug'),
        'database_connection' => config('database.default'),
        'timezone' => config('app.timezone')
    ]);
});

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the Ministry of Culture and Sport API']);
});
