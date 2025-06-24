<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\\Contracts\\Console\\Kernel')->bootstrap();

use Illuminate\Support\Facades\Storage;

$url = 'https://culture-backend.up.railway.app/storage/news-images/01JYBHEEXVSAKQWJNZM2V281NK.jpg';
$s3File = 'news-images/01JYBHEEXVSAKQWJNZM2V281NK.jpg';

try {
    $contents = file_get_contents($url);
    if ($contents === false) {
        throw new Exception('Failed to download image from URL');
    }
    $result = Storage::disk('s3')->put($s3File, $contents);
    var_dump($result);
    if ($result) {
        echo "✅ Uploaded successfully!\n";
    } else {
        echo "❌ put() returned false\n";
        echo "Check your S3 permissions, region, and bucket policy.\n";
        echo "Check your config/filesystems.php for the correct S3 disk setup.\n";
    }
} catch (Throwable $e) {
    echo "❌ Exception: " . $e->getMessage() . "\n";
}