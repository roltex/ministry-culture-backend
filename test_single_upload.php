<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\\Contracts\\Console\\Kernel')->bootstrap();

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

$localFile = storage_path('app/public/news-images/01JY7DZB5HT6M8YDK074Q243CA.jpg');
$s3File = 'news-images/01JY7DZB5HT6M8YDK074Q243CA.jpg';

try {
    $contents = File::get($localFile);
    $result = Storage::disk('s3')->put($s3File, $contents);
    var_dump($result);
    if ($result) {
        echo "✅ Uploaded successfully!\n";
    } else {
        echo "❌ put() returned false\n";
        // Try to upload with the AWS SDK directly if possible
        echo "Check your S3 permissions, region, and bucket policy.\n";
        echo "Check your config/filesystems.php for the correct S3 disk setup.\n";
    }
} catch (Throwable $e) {
    echo "❌ Exception: " . $e->getMessage() . "\n";
}