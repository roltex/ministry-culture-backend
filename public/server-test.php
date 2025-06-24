<?php
header('Content-Type: text/plain');

echo "=== Railway Server Test ===\n\n";

// Server information
echo "Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "\n";
echo "Server Name: " . ($_SERVER['SERVER_NAME'] ?? 'Unknown') . "\n";
echo "Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "\n";
echo "Script Name: " . ($_SERVER['SCRIPT_NAME'] ?? 'Unknown') . "\n";
echo "Request URI: " . ($_SERVER['REQUEST_URI'] ?? 'Unknown') . "\n";
echo "Request Method: " . ($_SERVER['REQUEST_METHOD'] ?? 'Unknown') . "\n";

// Check if we're using Apache or Nginx
if (strpos($_SERVER['SERVER_SOFTWARE'] ?? '', 'Apache') !== false) {
    echo "\n✅ Using Apache web server\n";
    echo "📄 .htaccess should be working\n";
} elseif (strpos($_SERVER['SERVER_SOFTWARE'] ?? '', 'nginx') !== false) {
    echo "\n✅ Using Nginx web server\n";
    echo "📄 .htaccess is NOT used (need nginx.conf)\n";
} else {
    echo "\n❓ Unknown web server\n";
}

// Test file access
echo "\n=== File Access Test ===\n";
$testFiles = [
    'js/filament/filament/app.js',
    'css/filament/filament/app.css',
    'test-simple.php',
    'test-assets.php'
];

foreach ($testFiles as $file) {
    $fullPath = __DIR__ . '/' . $file;
    if (file_exists($fullPath)) {
        $size = filesize($fullPath);
        echo "✅ {$file} exists ({$size} bytes)\n";
    } else {
        echo "❌ {$file} missing\n";
    }
}

// Test directory structure
echo "\n=== Directory Structure ===\n";
$dirs = [
    'js/filament/filament',
    'css/filament/filament',
    'js/filament/notifications',
    'css/filament/forms'
];

foreach ($dirs as $dir) {
    $fullPath = __DIR__ . '/' . $dir;
    if (is_dir($fullPath)) {
        $files = scandir($fullPath);
        $fileCount = count(array_filter($files, function($f) { return $f !== '.' && $f !== '..'; }));
        echo "📁 {$dir} exists ({$fileCount} files)\n";
    } else {
        echo "❌ {$dir} missing\n";
    }
}

// Check if we can access files via HTTP
echo "\n=== HTTP Access Test ===\n";
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

$testUrls = [
    '/js/filament/filament/app.js',
    '/css/filament/filament/app.css',
    '/test-simple.php'
];

foreach ($testUrls as $url) {
    $fullUrl = $baseUrl . $url;
    echo "Testing: {$fullUrl}\n";
    
    $context = stream_context_create([
        'http' => [
            'method' => 'HEAD',
            'timeout' => 5,
        ]
    ]);
    
    $headers = @get_headers($fullUrl, 1, $context);
    if ($headers && strpos($headers[0], '200') !== false) {
        echo "✅ Accessible\n";
    } else {
        echo "❌ Not accessible";
        if ($headers) {
            echo " (Response: " . $headers[0] . ")";
        }
        echo "\n";
    }
}

echo "\n=== Test Complete ===\n"; 