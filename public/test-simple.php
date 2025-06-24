<?php
header('Content-Type: text/plain');

echo "=== Simple Asset Test ===\n\n";

// Test if we can access a simple file
$testFile = __DIR__ . '/js/filament/filament/app.js';
echo "Testing file: {$testFile}\n";

if (file_exists($testFile)) {
    echo "✅ File exists\n";
    echo "File size: " . filesize($testFile) . " bytes\n";
    echo "File permissions: " . substr(sprintf('%o', fileperms($testFile)), -4) . "\n";
    
    // Try to read the first few bytes
    $handle = fopen($testFile, 'r');
    if ($handle) {
        $content = fread($handle, 100);
        fclose($handle);
        echo "First 100 bytes: " . substr($content, 0, 100) . "...\n";
    } else {
        echo "❌ Cannot read file\n";
    }
} else {
    echo "❌ File does not exist\n";
}

echo "\n=== Server Info ===\n";
echo "Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "\n";
echo "Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "\n";
echo "Script Name: " . ($_SERVER['SCRIPT_NAME'] ?? 'Unknown') . "\n";
echo "Request URI: " . ($_SERVER['REQUEST_URI'] ?? 'Unknown') . "\n";

echo "\n=== Directory Listing ===\n";
$jsDir = __DIR__ . '/js/filament/filament';
if (is_dir($jsDir)) {
    $files = scandir($jsDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $jsDir . '/' . $file;
            $size = filesize($filePath);
            echo "📄 {$file} ({$size} bytes)\n";
        }
    }
} else {
    echo "❌ Directory does not exist: {$jsDir}\n";
} 