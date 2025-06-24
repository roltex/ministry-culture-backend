<?php

/**
 * Upload all image folders from local storage to S3.
 * Run: php upload_all_images_to_s3.php
 */

require_once __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\\Contracts\\Console\\Kernel')->bootstrap();

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

echo "=== Uploading All Image Folders to S3 ===\n";

// List all folders you want to upload
$imageFolders = [
    'news-images',
    'project-images',
    'competition-images',
    'institution-images',
    'institution-logos',
    'user-avatars',
    // Add more folders here if needed
];

$totalFiles = 0;
$uploadedFiles = 0;
$skippedFiles = 0;
$failedFiles = 0;

foreach ($imageFolders as $folder) {
    $localPath = storage_path("app/public/{$folder}");
    $s3Path = $folder;

    echo "\nProcessing {$folder}...\n";

    if (!is_dir($localPath)) {
        echo "  ❌ Local directory does not exist: {$localPath}\n";
        continue;
    }

    $files = File::files($localPath);
    $totalFiles += count($files);

    foreach ($files as $file) {
        $fileName = $file->getFilename();
        $localFilePath = $file->getPathname();
        $s3FilePath = "{$s3Path}/{$fileName}";

        try {
            // Skip if file already exists in S3
            if (Storage::disk('s3')->exists($s3FilePath)) {
                echo "  ⚠️  File already exists in S3: {$fileName}\n";
                $skippedFiles++;
                continue;
            }

            // Upload file to S3
            $contents = File::get($localFilePath);
            $result = Storage::disk('s3')->put($s3FilePath, $contents);

            if ($result) {
                echo "  ✅ Uploaded: {$fileName}\n";
                $uploadedFiles++;
            } else {
                echo "  ❌ Failed to upload {$fileName} (put() returned false)\n";
                $failedFiles++;
            }
        } catch (Throwable $e) {
            echo "  ❌ Exception for {$fileName}: " . $e->getMessage() . "\n";
            $failedFiles++;
        }
    }
}

echo "\n=== Upload Summary ===\n";
echo "Total files found: {$totalFiles}\n";
echo "Uploaded: {$uploadedFiles}\n";
echo "Skipped (already in S3): {$skippedFiles}\n";
echo "Failed: {$failedFiles}\n";
echo "Done!\n"; 