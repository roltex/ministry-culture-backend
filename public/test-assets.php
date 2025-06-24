<?php

echo "=== Filament Assets Test ===\n\n";

// Test 1: Check if files exist
$assets = [
    'css/filament/filament/app.css',
    'js/filament/filament/app.js',
    'js/filament/notifications/notifications.js',
    'js/filament/support/support.js',
];

echo "1. Checking if files exist:\n";
foreach ($assets as $asset) {
    $path = __DIR__ . '/' . $asset;
    if (file_exists($path)) {
        $size = filesize($path);
        echo "✅ {$asset} (Size: {$size} bytes)\n";
    } else {
        echo "❌ {$asset} - Missing!\n";
    }
}

// Test 2: Check if files are readable
echo "\n2. Checking if files are readable:\n";
foreach ($assets as $asset) {
    $path = __DIR__ . '/' . $asset;
    if (is_readable($path)) {
        echo "✅ {$asset} - Readable\n";
    } else {
        echo "❌ {$asset} - Not readable\n";
    }
}

// Test 3: Check web server configuration
echo "\n3. Web server information:\n";
echo "Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "\n";
echo "Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "\n";
echo "Script Filename: " . ($_SERVER['SCRIPT_FILENAME'] ?? 'Unknown') . "\n";

// Test 4: Check if we can access files via HTTP
echo "\n4. Testing HTTP access:\n";
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$baseUrl = rtrim($baseUrl, '/');

foreach ($assets as $asset) {
    $url = $baseUrl . '/' . $asset;
    echo "Testing: {$url}\n";
    
    $context = stream_context_create([
        'http' => [
            'method' => 'HEAD',
            'timeout' => 5,
        ]
    ]);
    
    $headers = get_headers($url, 1, $context);
    if ($headers && strpos($headers[0], '200') !== false) {
        echo "✅ {$asset} - Accessible via HTTP\n";
    } else {
        echo "❌ {$asset} - Not accessible via HTTP\n";
        if ($headers) {
            echo "   Response: " . $headers[0] . "\n";
        }
    }
}

// Test 5: Check .htaccess
echo "\n5. Checking .htaccess:\n";
$htaccessPath = __DIR__ . '/.htaccess';
if (file_exists($htaccessPath)) {
    echo "✅ .htaccess exists\n";
    $htaccessContent = file_get_contents($htaccessPath);
    if (strpos($htaccessContent, 'RewriteEngine On') !== false) {
        echo "✅ RewriteEngine is enabled\n";
    } else {
        echo "❌ RewriteEngine not found\n";
    }
} else {
    echo "❌ .htaccess missing\n";
}

echo "\n=== Test Complete ===\n"; 