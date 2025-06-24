<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Handle static assets that might not be served by the web server
$requestUri = $_SERVER['REQUEST_URI'] ?? '';

// Remove query string for file checking
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Handle static assets
$staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'woff', 'woff2', 'ttf', 'eot'];

foreach ($staticExtensions as $ext) {
    if (str_ends_with($requestPath, '.' . $ext)) {
        // Try both with and without /public prefix
        $possiblePaths = [
            __DIR__ . $requestPath,  // Direct path
            __DIR__ . '/public' . $requestPath,  // With /public prefix
            dirname(__DIR__) . '/public' . $requestPath  // From parent directory
        ];
        
        foreach ($possiblePaths as $filePath) {
            if (file_exists($filePath)) {
                $mimeTypes = [
                    'css' => 'text/css',
                    'js' => 'application/javascript',
                    'png' => 'image/png',
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'gif' => 'image/gif',
                    'ico' => 'image/x-icon',
                    'svg' => 'image/svg+xml',
                    'woff' => 'font/woff',
                    'woff2' => 'font/woff2',
                    'ttf' => 'font/ttf',
                    'eot' => 'application/vnd.ms-fontobject'
                ];
                
                $mimeType = $mimeTypes[$ext] ?? 'application/octet-stream';
                header('Content-Type: ' . $mimeType);
                header('Cache-Control: public, max-age=31536000');
                header('Access-Control-Allow-Origin: *');
                readfile($filePath);
                exit;
            }
        }
    }
}

// Handle test files (both with and without .php extension)
$testFiles = [
    'debug',
    'test-simple', 
    'test-assets',
    'server-test',
    'test-storage'
];

foreach ($testFiles as $testFile) {
    if (str_starts_with($requestPath, '/' . $testFile)) {
        $filePath = __DIR__ . '/' . $testFile . '.php';
        if (file_exists($filePath)) {
            include $filePath;
            exit;
        }
    }
}

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
