<?php
echo "=== Debug Test ===\n";
echo "Time: " . date('Y-m-d H:i:s') . "\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Server: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "\n";
echo "Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "\n";
echo "Current File: " . __FILE__ . "\n";
echo "Directory: " . __DIR__ . "\n";

// Test if we can list files
echo "\n=== Files in current directory ===\n";
$files = scandir(__DIR__);
foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        echo "- $file\n";
    }
}

// Test if Filament directories exist
echo "\n=== Filament directories ===\n";
$filamentDirs = [
    'js/filament/filament',
    'css/filament/filament'
];

foreach ($filamentDirs as $dir) {
    $fullPath = __DIR__ . '/' . $dir;
    if (is_dir($fullPath)) {
        echo "✅ $dir exists\n";
        $files = scandir($fullPath);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                echo "  - $file\n";
            }
        }
    } else {
        echo "❌ $dir missing\n";
    }
}
?> 