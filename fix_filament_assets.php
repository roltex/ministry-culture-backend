<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Filament Assets Check ===\n";

// Check if storage link exists
if (!file_exists('public/storage')) {
    echo "❌ Storage link missing. Creating...\n";
    system('php artisan storage:link');
    echo "✅ Storage link created.\n";
} else {
    echo "✅ Storage link exists.\n";
}

// Check if Filament assets directory exists
$filamentAssetsDir = 'public/css/filament';
if (!is_dir($filamentAssetsDir)) {
    echo "❌ Filament CSS assets missing. Publishing...\n";
    system('php artisan vendor:publish --tag=filament-assets --ansi');
    echo "✅ Filament assets published.\n";
} else {
    echo "✅ Filament CSS assets exist.\n";
}

// Check specific Filament asset files
$requiredAssets = [
    'public/css/filament/filament/app.css',
    'public/css/filament/forms/forms.css',
    'public/css/filament/support/support.css',
    'public/js/filament/filament/app.js',
    'public/js/filament/notifications/notifications.js',
    'public/js/filament/support/support.js',
    'public/js/filament/filament/echo.js',
];

echo "\n=== Checking Required Assets ===\n";
foreach ($requiredAssets as $asset) {
    if (file_exists($asset)) {
        echo "✅ {$asset}\n";
    } else {
        echo "❌ {$asset} - Missing\n";
    }
}

// Try to republish if assets are missing
$missingAssets = array_filter($requiredAssets, function($asset) {
    return !file_exists($asset);
});

if (!empty($missingAssets)) {
    echo "\n❌ Some assets are missing. Republishing...\n";
    system('php artisan vendor:publish --tag=filament-assets --force --ansi');
    
    echo "\n=== Re-checking Assets ===\n";
    foreach ($requiredAssets as $asset) {
        if (file_exists($asset)) {
            echo "✅ {$asset}\n";
        } else {
            echo "❌ {$asset} - Still missing\n";
        }
    }
}

echo "\n=== Done ===\n"; 