<?php
// Test file to check storage link and file accessibility
echo "<h1>Storage Test</h1>";

// Check if storage link exists
$storageLink = __DIR__ . '/storage';
echo "<h2>Storage Link Check</h2>";
if (is_link($storageLink)) {
    echo "✅ Storage link exists<br>";
    echo "Link target: " . readlink($storageLink) . "<br>";
} else {
    echo "❌ Storage link does not exist<br>";
}

// Check if storage directory exists
$storageDir = __DIR__ . '/storage';
echo "<h2>Storage Directory Check</h2>";
if (is_dir($storageDir)) {
    echo "✅ Storage directory exists<br>";
    $files = scandir($storageDir);
    echo "Contents: " . implode(', ', array_slice($files, 0, 10)) . "<br>";
} else {
    echo "❌ Storage directory does not exist<br>";
}

// Check specific image file
$imagePath = __DIR__ . '/storage/news-images/01JYBHABJAH0Q67204VHP1HFEC.jpg';
echo "<h2>Image File Check</h2>";
if (file_exists($imagePath)) {
    echo "✅ Image file exists<br>";
    echo "File size: " . filesize($imagePath) . " bytes<br>";
    echo "<img src='/storage/news-images/01JYBHABJAH0Q67204VHP1HFEC.jpg' style='max-width: 200px;'><br>";
} else {
    echo "❌ Image file does not exist<br>";
    echo "Path: $imagePath<br>";
}

// Check current working directory and file structure
echo "<h2>File Structure</h2>";
echo "Current directory: " . __DIR__ . "<br>";
echo "Storage app public: " . __DIR__ . '/storage/app/public' . "<br>";

if (is_dir(__DIR__ . '/storage/app/public')) {
    echo "✅ storage/app/public exists<br>";
    $publicFiles = scandir(__DIR__ . '/storage/app/public');
    echo "Public contents: " . implode(', ', array_slice($publicFiles, 0, 10)) . "<br>";
} else {
    echo "❌ storage/app/public does not exist<br>";
}
?> 