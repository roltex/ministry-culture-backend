<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    // Basic health check
    Route::get('/health', function () {
        return response()->json([
            'status' => 'ok',
            'timestamp' => now()->toISOString(),
            'environment' => app()->environment(),
            'version' => '1.0.0'
        ]);
    });

    // Test route to confirm Laravel runs
    Route::get('/test', function () {
        return 'Hello World! Laravel is working.';
    });

    // Default API root route
    Route::get('/', function () {
        return response()->json([
            'message' => 'Welcome to the Ministry of Culture of Georgia API',
            'version' => '1.0.0',
            'timestamp' => now()->toISOString()
        ]);
    });

    // Debugging route
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

    // Storage testing route
    Route::get('/test-storage', function () {
        echo "<h1>Storage Test</h1>";

        $storageLink = public_path('storage');
        echo "<h2>Storage Link Check</h2>";
        if (is_link($storageLink)) {
            echo "✅ Storage link exists<br>";
            echo "Link target: " . readlink($storageLink) . "<br>";
        } else {
            echo "❌ Storage link does not exist<br>";
        }

        $storageDir = public_path('storage');
        echo "<h2>Storage Directory Check</h2>";
        if (is_dir($storageDir)) {
            echo "✅ Storage directory exists<br>";
            $files = scandir($storageDir);
            echo "Contents: " . implode(', ', array_slice($files, 0, 10)) . "<br>";
        } else {
            echo "❌ Storage directory does not exist<br>";
        }

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

        $newsImagesPath = storage_path('app/public/news-images');
        if (is_dir($newsImagesPath)) {
            echo "✅ news-images directory exists<br>";
            $newsFiles = scandir($newsImagesPath);
            echo "News images: " . implode(', ', array_slice($newsFiles, 0, 5)) . "<br>";
        } else {
            echo "❌ news-images directory does not exist<br>";
        }
    });

    // View last 100 lines of Laravel log
    Route::get('/laravel-log', function () {
        $logFile = storage_path('logs/laravel.log');
        if (!file_exists($logFile)) {
            return response('Log file not found.', 404)->header('Content-Type', 'text/plain');
        }
        $lines = [];
        $fp = fopen($logFile, 'r');
        if ($fp) {
            $buffer = [];
            while (!feof($fp)) {
                $buffer[] = fgets($fp);
                if (count($buffer) > 100) {
                    array_shift($buffer);
                }
            }
            fclose($fp);
            $lines = $buffer;
        }
        return response(implode('', $lines))->header('Content-Type', 'text/plain');
    });

});
