<?php

/**
 * Test AWS Credentials and S3 Bucket Access
 */

require_once __DIR__ . '/vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

echo "=== AWS Credentials Test ===\n";

// Get environment variables
$key = getenv('AWS_ACCESS_KEY_ID');
$secret = getenv('AWS_SECRET_ACCESS_KEY');
$region = getenv('AWS_DEFAULT_REGION');
$bucket = getenv('AWS_BUCKET');

echo "AWS Configuration:\n";
echo "- Access Key: " . substr($key, 0, 10) . "...\n";
echo "- Secret Key: " . substr($secret, 0, 10) . "...\n";
echo "- Region: {$region}\n";
echo "- Bucket: {$bucket}\n";

try {
    // Create S3 client
    $s3Client = new S3Client([
        'version' => 'latest',
        'region'  => $region,
        'credentials' => [
            'key'    => $key,
            'secret' => $secret,
        ],
    ]);
    
    echo "\n✅ S3 Client created successfully\n";
    
    // Test bucket existence
    echo "\nTesting bucket existence...\n";
    $result = $s3Client->headBucket([
        'Bucket' => $bucket
    ]);
    echo "✅ Bucket '{$bucket}' exists and is accessible\n";
    
    // Test bucket permissions
    echo "\nTesting bucket permissions...\n";
    try {
        $result = $s3Client->listObjects([
            'Bucket' => $bucket,
            'MaxKeys' => 1
        ]);
        echo "✅ Can list objects in bucket\n";
    } catch (AwsException $e) {
        echo "❌ Cannot list objects: " . $e->getMessage() . "\n";
    }
    
    // Test upload permission
    echo "\nTesting upload permission...\n";
    $testKey = 'test-credentials/test-file.txt';
    $testContent = 'Test content - ' . date('Y-m-d H:i:s');
    
    try {
        $result = $s3Client->putObject([
            'Bucket' => $bucket,
            'Key'    => $testKey,
            'Body'   => $testContent,
            'ACL'    => 'public-read'
        ]);
        echo "✅ Upload test successful\n";
        echo "✅ Object URL: " . $result['ObjectURL'] . "\n";
        
        // Clean up test file
        $s3Client->deleteObject([
            'Bucket' => $bucket,
            'Key'    => $testKey
        ]);
        echo "✅ Test file cleaned up\n";
        
    } catch (AwsException $e) {
        echo "❌ Upload test failed: " . $e->getMessage() . "\n";
        echo "Error Code: " . $e->getAwsErrorCode() . "\n";
    }
    
} catch (AwsException $e) {
    echo "❌ AWS Error: " . $e->getMessage() . "\n";
    echo "Error Code: " . $e->getAwsErrorCode() . "\n";
    echo "Error Type: " . $e->getAwsErrorType() . "\n";
} catch (Exception $e) {
    echo "❌ General Error: " . $e->getMessage() . "\n";
}

echo "\n=== Test Complete ===\n"; 