<?php

/**
 * Test S3 Upload Functionality
 * Run this script to test if S3 uploads are working correctly
 */

require_once __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Storage;

echo "=== S3 Upload Test ===\n";

// Check if S3 is configured
$s3Config = config('filesystems.disks.s3');
echo "S3 Configuration:\n";
echo "- Driver: " . $s3Config['driver'] . "\n";
echo "- Bucket: " . $s3Config['bucket'] . "\n";
echo "- Region: " . $s3Config['region'] . "\n";
echo "- URL: " . $s3Config['url'] . "\n";

// Test S3 connection
try {
    $testContent = "Test file content - " . date('Y-m-d H:i:s');
    $testPath = 'test-upload/test-file.txt';
    
    echo "\nTesting S3 upload...\n";
    
    // Upload test file
    Storage::disk('s3')->put($testPath, $testContent, 'public');
    echo "✅ File uploaded successfully\n";
    
    // Check if file exists
    if (Storage::disk('s3')->exists($testPath)) {
        echo "✅ File exists in S3\n";
        
        // Get file URL
        $url = Storage::disk('s3')->url($testPath);
        echo "✅ File URL: {$url}\n";
        
        // Download and verify content
        $downloadedContent = Storage::disk('s3')->get($testPath);
        if ($downloadedContent === $testContent) {
            echo "✅ File content verified\n";
        } else {
            echo "❌ File content mismatch\n";
        }
        
        // Clean up test file
        Storage::disk('s3')->delete($testPath);
        echo "✅ Test file cleaned up\n";
        
    } else {
        echo "❌ File not found in S3\n";
    }
    
} catch (Exception $e) {
    echo "❌ S3 Test Failed: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\n=== Test Complete ===\n"; 