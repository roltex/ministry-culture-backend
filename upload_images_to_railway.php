<?php

/**
 * Script to copy existing images to Railway storage
 * Run this locally to prepare images for Railway deployment
 */

echo "=== Image Upload Script for Railway ===\n";

// Define the source and destination directories
$sourceDir = __DIR__ . '/public/storage';
$destDir = __DIR__ . '/storage/app/public';

// Create destination directories if they don't exist
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

foreach ($directories as $dir) {
    $fullPath = $destDir . '/' . $dir;
    if (!is_dir($fullPath)) {
        mkdir($fullPath, 0755, true);
        echo "Created directory: $dir\n";
    }
}

// Copy files from source to destination
function copyDirectory($source, $destination) {
    if (!is_dir($source)) {
        echo "Source directory does not exist: $source\n";
        return;
    }
    
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    
    $files = scandir($source);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $sourcePath = $source . '/' . $file;
        $destPath = $destination . '/' . $file;
        
        if (is_dir($sourcePath)) {
            copyDirectory($sourcePath, $destPath);
        } else {
            if (copy($sourcePath, $destPath)) {
                echo "Copied: $file\n";
            } else {
                echo "Failed to copy: $file\n";
            }
        }
    }
}

// Copy each directory
foreach ($directories as $dir) {
    $sourcePath = $sourceDir . '/' . $dir;
    $destPath = $destDir . '/' . $dir;
    
    echo "\nProcessing $dir...\n";
    copyDirectory($sourcePath, $destPath);
}

echo "\n=== Upload Complete ===\n";
echo "Images have been copied to storage/app/public/\n";
echo "These will be included in your Railway deployment.\n";
echo "\nNote: For production, consider using a cloud storage service\n";
echo "like AWS S3 or Cloudinary for better performance and persistence.\n"; 