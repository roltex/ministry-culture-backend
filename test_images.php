<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\News;

echo "🔍 Testing API and Images\n";
echo "========================\n\n";

// Test API endpoint
echo "Testing API endpoint...\n";
try {
    $news = News::published()->first();
    if ($news) {
        echo "✅ Found news: " . $news->getTranslation('title', 'ka') . "\n";
        echo "   Image: " . $news->featured_image . "\n";
        
        if ($news->featured_image) {
            $imageUrl = Storage::url($news->featured_image);
            echo "   Full URL: " . $imageUrl . "\n";
            
            // Check if image file exists
            $imagePath = storage_path('app/public/' . $news->featured_image);
            if (file_exists($imagePath)) {
                echo "   ✅ Image file exists locally\n";
            } else {
                echo "   ❌ Image file not found locally\n";
            }
            
            // Test if image is accessible via web
            $testUrl = 'http://localhost:8000' . $imageUrl;
            echo "   Testing web access: " . $testUrl . "\n";
            
            $headers = get_headers($testUrl);
            if ($headers && strpos($headers[0], '200') !== false) {
                echo "   ✅ Image accessible via web\n";
            } else {
                echo "   ❌ Image not accessible via web\n";
            }
        } else {
            echo "   No featured image\n";
        }
    } else {
        echo "❌ No published news found\n";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n";

// Test all news with images
echo "Testing all news images...\n";
$allNews = News::all();
foreach ($allNews as $news) {
    echo "- News ID: {$news->id}\n";
    echo "  Title: " . $news->getTranslation('title', 'ka') . "\n";
    echo "  Image: " . ($news->featured_image ?: 'No image') . "\n";
    
    if ($news->featured_image) {
        $imageUrl = Storage::url($news->featured_image);
        echo "  URL: " . $imageUrl . "\n";
        
        // Check if accessible
        $testUrl = 'http://localhost:8000' . $imageUrl;
        $headers = @get_headers($testUrl);
        if ($headers && strpos($headers[0], '200') !== false) {
            echo "  ✅ Accessible\n";
        } else {
            echo "  ❌ Not accessible\n";
        }
    }
    echo "\n";
}

echo "\nStorage configuration:\n";
echo "FILESYSTEM_DISK: " . config('filesystems.default') . "\n";
echo "Storage URL: " . config('app.url') . "/storage\n"; 