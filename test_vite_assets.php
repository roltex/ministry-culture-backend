<?php

echo "=== Vite Assets Test ===\n";

// Check if Vite manifest exists
$manifestPath = public_path('build/manifest.json');
if (file_exists($manifestPath)) {
    echo "✅ Vite manifest exists\n";
    
    $manifest = json_decode(file_get_contents($manifestPath), true);
    if ($manifest) {
        echo "✅ Manifest is valid JSON\n";
        
        // Check for CSS and JS assets
        $hasCss = false;
        $hasJs = false;
        
        foreach ($manifest as $entry => $details) {
            if (str_contains($entry, 'app.css')) {
                $hasCss = true;
                echo "✅ Found CSS asset: {$details['file']}\n";
            }
            if (str_contains($entry, 'app.js')) {
                $hasJs = true;
                echo "✅ Found JS asset: {$details['file']}\n";
            }
        }
        
        if (!$hasCss) {
            echo "❌ No CSS asset found in manifest\n";
        }
        if (!$hasJs) {
            echo "❌ No JS asset found in manifest\n";
        }
    } else {
        echo "❌ Manifest is not valid JSON\n";
    }
} else {
    echo "❌ Vite manifest missing\n";
}

// Check build directory
$buildDir = public_path('build');
if (is_dir($buildDir)) {
    echo "✅ Build directory exists\n";
    $files = scandir($buildDir);
    echo "📄 Build directory contents:\n";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $buildDir . '/' . $file;
            $size = is_file($filePath) ? filesize($filePath) : 'DIR';
            echo "  - {$file} ({$size})\n";
        }
    }
} else {
    echo "❌ Build directory missing\n";
}

// Test asset URLs
echo "\n=== Testing Asset URLs ===\n";
$baseUrl = 'https://culture-backend.up.railway.app';

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
    
    foreach ($manifest as $entry => $details) {
        if (str_contains($entry, 'app.css') || str_contains($entry, 'app.js')) {
            $assetUrl = $baseUrl . '/build/' . $details['file'];
            echo "Testing: {$assetUrl}\n";
            
            $context = stream_context_create([
                'http' => [
                    'method' => 'HEAD',
                    'timeout' => 10,
                ]
            ]);
            
            $headers = get_headers($assetUrl, 1, $context);
            if ($headers && strpos($headers[0], '200') !== false) {
                echo "✅ Asset accessible: {$details['file']}\n";
            } else {
                echo "❌ Asset not accessible: {$details['file']}\n";
            }
        }
    }
}

echo "\n=== Test Complete ===\n"; 