<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Force Publish Filament Assets ===\n";

// 1. Ensure storage link exists
echo "1. Creating storage link...\n";
if (!file_exists('public/storage')) {
    system('php artisan storage:link');
    echo "✅ Storage link created\n";
} else {
    echo "✅ Storage link exists\n";
}

// 2. Force publish all Filament assets
echo "2. Publishing Filament assets...\n";
system('php artisan vendor:publish --tag=filament-assets --force --ansi');
echo "✅ Filament assets published\n";

// 3. Check if assets were actually created
echo "3. Verifying assets...\n";
$requiredAssets = [
    'public/css/filament/filament/app.css',
    'public/css/filament/forms/forms.css',
    'public/css/filament/support/support.css',
    'public/js/filament/filament/app.js',
    'public/js/filament/notifications/notifications.js',
    'public/js/filament/support/support.js',
    'public/js/filament/filament/echo.js',
];

$missingAssets = [];
foreach ($requiredAssets as $asset) {
    if (file_exists($asset)) {
        echo "✅ {$asset}\n";
    } else {
        echo "❌ {$asset} - Missing\n";
        $missingAssets[] = $asset;
    }
}

// 4. If assets are still missing, try alternative approach
if (!empty($missingAssets)) {
    echo "\n4. Assets still missing, trying alternative approach...\n";
    
    // Try to copy assets manually from vendor
    $vendorAssets = [
        'vendor/filament/filament/resources/css/app.css' => 'public/css/filament/filament/app.css',
        'vendor/filament/filament/resources/css/forms.css' => 'public/css/filament/forms/forms.css',
        'vendor/filament/filament/resources/css/support.css' => 'public/css/filament/support/support.css',
        'vendor/filament/filament/resources/js/app.js' => 'public/js/filament/filament/app.js',
        'vendor/filament/filament/resources/js/notifications.js' => 'public/js/filament/notifications/notifications.js',
        'vendor/filament/filament/resources/js/support.js' => 'public/js/filament/support/support.js',
        'vendor/filament/filament/resources/js/echo.js' => 'public/js/filament/filament/echo.js',
    ];
    
    foreach ($vendorAssets as $source => $destination) {
        if (file_exists($source)) {
            $dir = dirname($destination);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            copy($source, $destination);
            echo "✅ Copied {$source} to {$destination}\n";
        } else {
            echo "❌ Source file not found: {$source}\n";
        }
    }
}

// 5. Clear caches
echo "\n5. Clearing caches...\n";
system('php artisan config:clear');
system('php artisan route:clear');
system('php artisan view:clear');
echo "✅ Caches cleared\n";

echo "\n=== Asset Publishing Complete ===\n"; 