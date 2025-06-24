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

// Serve Filament static assets
Route::get('/css/filament/{path}', function ($path) {
    $filePath = public_path("css/filament/{$path}");
    if (file_exists($filePath)) {
        return response()->file($filePath, [
            'Content-Type' => 'text/css',
            'Cache-Control' => 'public, max-age=31536000',
            'Access-Control-Allow-Origin' => '*'
        ]);
    }
    abort(404);
})->where('path', '.*');

Route::get('/js/filament/{path}', function ($path) {
    $filePath = public_path("js/filament/{$path}");
    if (file_exists($filePath)) {
        return response()->file($filePath, [
            'Content-Type' => 'application/javascript',
            'Cache-Control' => 'public, max-age=31536000',
            'Access-Control-Allow-Origin' => '*'
        ]);
    }
    abort(404);
})->where('path', '.*');

// API routes
Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the Ministry of Culture and Sport API',
        'version' => '1.0.0',
        'timestamp' => now()->toISOString()
    ]);
});

// Test route for storage debugging
Route::get('/test-storage', function () {
    echo "<h1>Storage Test</h1>";
    
    // Check if storage link exists
    $storageLink = public_path('storage');
    echo "<h2>Storage Link Check</h2>";
    if (is_link($storageLink)) {
        echo "✅ Storage link exists<br>";
        echo "Link target: " . readlink($storageLink) . "<br>";
    } else {
        echo "❌ Storage link does not exist<br>";
    }
    
    // Check if storage directory exists
    $storageDir = public_path('storage');
    echo "<h2>Storage Directory Check</h2>";
    if (is_dir($storageDir)) {
        echo "✅ Storage directory exists<br>";
        $files = scandir($storageDir);
        echo "Contents: " . implode(', ', array_slice($files, 0, 10)) . "<br>";
    } else {
        echo "❌ Storage directory does not exist<br>";
    }
    
    // Check specific image file
    $imagePath = public_path('storage/news-images/01JYBHABJAH0Q67204VHP1HFEC.jpg');
    echo "<h2>Image File Check</h2>";
    if (file_exists($imagePath)) {
        echo "✅ Image file exists<br>";
        echo "File size: " . filesize($imagePath) . " bytes<br>";
        echo "<img src='/storage/news-images/01JYBHABJAH0Q67204VHP1HFEC.jpg' style='max-width: 200px;'><br>";
    } else {
        echo "❌ Image file does not exist<br>";
        echo "Path: $imagePath<br>";
    }
    
    // Check current working directory and file structure
    echo "<h2>File Structure</h2>";
    echo "Current directory: " . getcwd() . "<br>";
    echo "Public path: " . public_path() . "<br>";
    echo "Storage app public: " . storage_path('app/public') . "<br>";
    
    if (is_dir(storage_path('app/public'))) {
        echo "✅ storage/app/public exists<br>";
        $publicFiles = scandir(storage_path('app/public'));
        echo "Public contents: " . implode(', ', array_slice($publicFiles, 0, 10)) . "<br>";
    } else {
        echo "❌ storage/app/public does not exist<br>";
    }
    
    // Check if news-images directory exists
    $newsImagesPath = storage_path('app/public/news-images');
    if (is_dir($newsImagesPath)) {
        echo "✅ news-images directory exists<br>";
        $newsFiles = scandir($newsImagesPath);
        echo "News images: " . implode(', ', array_slice($newsFiles, 0, 5)) . "<br>";
    } else {
        echo "❌ news-images directory does not exist<br>";
    }
});
