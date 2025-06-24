<?php

echo "=== Filament Assets Verification ===\n\n";

// Check if we're in the right directory
echo "Current directory: " . getcwd() . "\n";
echo "Public directory: " . __DIR__ . "/public\n\n";

// Required assets to check
$requiredAssets = [
    'public/js/filament/filament/app.js',
    'public/js/filament/notifications/notifications.js',
    'public/js/filament/support/support.js',
    'public/css/filament/filament/app.css',
    'public/css/filament/forms/forms.css',
    'public/css/filament/support/support.css',
];

$missingAssets = [];
$existingAssets = [];

foreach ($requiredAssets as $asset) {
    if (file_exists($asset)) {
        $size = filesize($asset);
        echo "✅ {$asset} ({$size} bytes)\n";
        $existingAssets[] = $asset;
    } else {
        echo "❌ {$asset} - Missing!\n";
        $missingAssets[] = $asset;
    }
}

echo "\n=== Summary ===\n";
echo "Existing assets: " . count($existingAssets) . "\n";
echo "Missing assets: " . count($missingAssets) . "\n";

if (!empty($missingAssets)) {
    echo "\n=== Missing Assets ===\n";
    foreach ($missingAssets as $asset) {
        echo "- {$asset}\n";
    }
    
    echo "\n=== Attempting to fix missing assets ===\n";
    
    // Try to create directories and copy files
    foreach ($missingAssets as $asset) {
        $dir = dirname($asset);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
            echo "Created directory: {$dir}\n";
        }
    }
    
    // Try to publish assets again
    echo "\nPublishing Filament assets...\n";
    system('php artisan vendor:publish --tag=filament-assets --force --ansi');
    
    // Check again
    echo "\n=== Re-checking assets ===\n";
    foreach ($missingAssets as $asset) {
        if (file_exists($asset)) {
            $size = filesize($asset);
            echo "✅ {$asset} ({$size} bytes) - Now exists!\n";
        } else {
            echo "❌ {$asset} - Still missing\n";
        }
    }
}

echo "\n=== Verification Complete ===\n"; 