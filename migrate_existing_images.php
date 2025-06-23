<?php

/**
 * Script to migrate existing images from local storage to S3
 * This script will be run on Railway during deployment
 */

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Migrating Existing Images to S3 ===\n";

// Set the filesystem to S3
config(['filesystems.default' => 's3']);

// Directories to migrate
$directories = [
    'news-images',
    'project-images',
    'competition-images',
    'competition-forms',
    'institution-images',
    'institution-logos',
    'legislation-documents',
    'user-avatars',
    'vacancy-forms'
];

$totalFiles = 0;
$uploadedFiles = 0;
$failedFiles = 0;

foreach ($directories as $directory) {
    $localPath = storage_path("app/public/{$directory}");
    $s3Path = $directory;
    
    echo "\nProcessing {$directory}...\n";
    
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
            // Check if file already exists in S3
            if (Storage::disk('s3')->exists($s3FilePath)) {
                echo "  ⚠️  File already exists in S3: {$fileName}\n";
                continue;
            }
            
            // Upload file to S3
            $contents = File::get($localFilePath);
            Storage::disk('s3')->put($s3FilePath, $contents, 'public');
            
            echo "  ✅ Uploaded: {$fileName}\n";
            $uploadedFiles++;
            
        } catch (Exception $e) {
            echo "  ❌ Failed to upload {$fileName}: " . $e->getMessage() . "\n";
            $failedFiles++;
        }
    }
}

echo "\n=== Migration Summary ===\n";
echo "Total files found: {$totalFiles}\n";
echo "Successfully uploaded: {$uploadedFiles}\n";
echo "Failed uploads: {$failedFiles}\n";

if ($uploadedFiles > 0) {
    echo "\n✅ Migration completed successfully!\n";
    echo "Your images are now stored in S3 and will be accessible via full URLs.\n";
} else {
    echo "\n⚠️  No files were uploaded. Check your S3 configuration.\n";
} 