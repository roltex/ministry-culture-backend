<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Fix Filament Assets Loading ===\n";

// 1. Ensure proper directory structure
echo "1. Creating directory structure...\n";
$directories = [
    'public/css/filament/filament',
    'public/css/filament/forms',
    'public/css/filament/support',
    'public/js/filament/filament',
    'public/js/filament/notifications',
    'public/js/filament/support',
    'public/js/filament/forms',
    'public/js/filament/tables',
    'public/js/filament/widgets',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "✅ Created directory: {$dir}\n";
    }
}

// 2. Force publish Filament assets with multiple approaches
echo "\n2. Publishing Filament assets...\n";

// Approach 1: Standard publish
system('php artisan vendor:publish --tag=filament-assets --force --ansi');

// Approach 2: Publish specific components
system('php artisan vendor:publish --tag=filament-config --force --ansi');
system('php artisan vendor:publish --tag=filament-panels --force --ansi');

// Approach 3: Clear and republish
system('php artisan config:clear');
system('php artisan vendor:publish --tag=filament-assets --force --ansi');

// 3. Check and copy assets manually if needed
echo "\n3. Verifying and copying assets...\n";
$requiredAssets = [
    'public/css/filament/filament/app.css',
    'public/css/filament/forms/forms.css',
    'public/css/filament/support/support.css',
    'public/js/filament/filament/app.js',
    'public/js/filament/notifications/notifications.js',
    'public/js/filament/support/support.js',
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

// 4. Manual copy from vendor if assets are missing
if (!empty($missingAssets)) {
    echo "\n4. Copying missing assets from vendor...\n";
    
    $vendorAssets = [
        'vendor/filament/filament/resources/css/app.css' => 'public/css/filament/filament/app.css',
        'vendor/filament/filament/resources/css/forms.css' => 'public/css/filament/forms/forms.css',
        'vendor/filament/filament/resources/css/support.css' => 'public/css/filament/support/support.css',
        'vendor/filament/filament/resources/js/app.js' => 'public/js/filament/filament/app.js',
        'vendor/filament/filament/resources/js/notifications.js' => 'public/js/filament/notifications/notifications.js',
        'vendor/filament/filament/resources/js/support.js' => 'public/js/filament/support/support.js',
    ];
    
    foreach ($vendorAssets as $source => $destination) {
        if (file_exists($source)) {
            $dir = dirname($destination);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            if (copy($source, $destination)) {
                echo "✅ Copied {$source} to {$destination}\n";
            } else {
                echo "❌ Failed to copy {$source}\n";
            }
        } else {
            echo "❌ Source file not found: {$source}\n";
        }
    }
}

// 5. Set proper permissions
echo "\n5. Setting permissions...\n";
system('chmod -R 755 public/css/filament');
system('chmod -R 755 public/js/filament');

// 6. Clear all caches
echo "\n6. Clearing caches...\n";
system('php artisan config:clear');
system('php artisan route:clear');
system('php artisan view:clear');
system('php artisan cache:clear');
system('php artisan filament:cache-components');

// 7. Optimize for production
echo "\n7. Optimizing for production...\n";
system('php artisan config:cache');
system('php artisan route:cache');
system('php artisan view:cache');

// 8. Final verification
echo "\n8. Final verification...\n";
$finalCheck = [
    'public/css/filament/filament/app.css',
    'public/js/filament/filament/app.js',
];

foreach ($finalCheck as $asset) {
    if (file_exists($asset)) {
        $size = filesize($asset);
        echo "✅ {$asset} (Size: {$size} bytes)\n";
    } else {
        echo "❌ {$asset} - Still missing!\n";
    }
}

echo "\n=== Filament Assets Fix Complete ===\n";
echo "If assets are still missing, check:\n";
echo "1. Railway logs for any errors\n";
echo "2. File permissions on Railway\n";
echo "3. Storage link: php artisan storage:link\n";
echo "4. Try accessing: https://your-domain.railway.app/css/filament/filament/app.css\n"; 