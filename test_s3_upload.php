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
    
    // Upload test file with detailed error handling
    try {
        $uploadResult = Storage::disk('s3')->put($testPath, $testContent);
        echo "✅ Upload result: " . ($uploadResult ? "SUCCESS" : "FAILED") . "\n";
        
        if (!$uploadResult) {
            echo "❌ Upload failed - check your AWS credentials and bucket permissions\n";
            echo "Make sure your AWS credentials have write access to the bucket\n";
            exit(1);
        }
    } catch (Exception $e) {
        echo "❌ Upload exception: " . $e->getMessage() . "\n";
        echo "This usually means:\n";
        echo "1. AWS credentials are incorrect\n";
        echo "2. Bucket doesn't exist\n";
        echo "3. No write permissions to bucket\n";
        echo "4. Network connectivity issues\n";
        exit(1);
    }
    
    // Wait a moment for S3 to process
    sleep(2);
    
    // Try to list files in the test directory
    echo "\nListing files in test-upload directory:\n";
    try {
        $files = Storage::disk('s3')->files('test-upload');
        if (empty($files)) {
            echo "  No files found in test-upload directory\n";
        } else {
            foreach ($files as $file) {
                echo "  - {$file}\n";
            }
        }
    } catch (Exception $e) {
        echo "❌ List files failed: " . $e->getMessage() . "\n";
    }
    
    // Check if file exists using a different method
    echo "\nChecking file existence...\n";
    try {
        $exists = Storage::disk('s3')->exists($testPath);
        echo "✅ File exists check: " . ($exists ? "YES" : "NO") . "\n";
    } catch (Exception $e) {
        echo "❌ Exists check failed: " . $e->getMessage() . "\n";
    }
    
    // Try to get file URL
    try {
        $url = Storage::disk('s3')->url($testPath);
        echo "✅ File URL: {$url}\n";
        
        // Test if URL is accessible
        $headers = get_headers($url);
        if ($headers && strpos($headers[0], '200') !== false) {
            echo "✅ File URL is accessible\n";
        } else {
            echo "⚠️  File URL might not be accessible (check bucket permissions)\n";
            echo "Response: " . ($headers ? $headers[0] : "No response") . "\n";
        }
    } catch (Exception $e) {
        echo "❌ URL generation failed: " . $e->getMessage() . "\n";
    }
    
    // Try to download and verify content
    try {
        $downloadedContent = Storage::disk('s3')->get($testPath);
        if ($downloadedContent === $testContent) {
            echo "✅ File content verified\n";
        } else {
            echo "❌ File content mismatch\n";
            echo "Expected: " . substr($testContent, 0, 50) . "...\n";
            echo "Got: " . substr($downloadedContent, 0, 50) . "...\n";
        }
    } catch (Exception $e) {
        echo "❌ Content download failed: " . $e->getMessage() . "\n";
    }
    
    // Clean up test file
    try {
        Storage::disk('s3')->delete($testPath);
        echo "✅ Test file cleaned up\n";
    } catch (Exception $e) {
        echo "❌ Cleanup failed: " . $e->getMessage() . "\n";
    }
    
} catch (Exception $e) {
    echo "❌ S3 Test Failed: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\n=== Test Complete ===\n"; 