<?php

// Simple script to copy existing project images with new names
$sourceDir = __DIR__ . '/storage/app/public/project-images/';
$existingImages = [
    '01JYBQ2J0C4JC5J6NEX54Y9TZH.jpg',
    '01JY7J4VWXP69JR2FK3S0CZV53.jpg',
    '01JY7GKC5APKEPNMZTYYDF1R6Y.jpeg'
];

$newImageNames = [
    'national-theater.jpg',
    'film-center.jpg',
    'sports-center.jpg',
    'digital-archive.jpg',
    'art-studios.jpg',
    'music-academy.jpg',
    'folk-art-center.jpg',
    'sports-medicine.jpg',
    'writers-program.jpg',
    'cultural-tourism.jpg',
    'sports-talent.jpg'
];

$imageIndex = 0;
foreach ($newImageNames as $newName) {
    $sourceImage = $existingImages[$imageIndex % count($existingImages)];
    $sourcePath = $sourceDir . $sourceImage;
    $destPath = $sourceDir . $newName;
    
    if (file_exists($sourcePath)) {
        if (copy($sourcePath, $destPath)) {
            echo "Copied {$sourceImage} to {$newName}\n";
        } else {
            echo "Failed to copy {$sourceImage} to {$newName}\n";
        }
    } else {
        echo "Source image {$sourceImage} not found\n";
    }
    
    $imageIndex++;
}

echo "Project images copied successfully!\n"; 