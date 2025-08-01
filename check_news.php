<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\News;

echo "Total news count: " . News::count() . "\n";
echo "Published news count: " . News::published()->count() . "\n\n";

echo "All news:\n";
$allNews = News::all();
foreach ($allNews as $news) {
    echo "- ID: {$news->id}\n";
    echo "  Title (KA): " . $news->getTranslation('title', 'ka') . "\n";
    echo "  Title (EN): " . $news->getTranslation('title', 'en') . "\n";
    echo "  Slug: {$news->slug}\n";
    echo "  Is Published: " . ($news->is_published ? 'Yes' : 'No') . "\n";
    echo "  Published At: {$news->published_at}\n";
    echo "  Created At: {$news->created_at}\n";
    echo "  Updated At: {$news->updated_at}\n";
    echo "  ---\n";
}

echo "\nPublished news:\n";
$publishedNews = News::published()->get();
foreach ($publishedNews as $news) {
    echo "- ID: {$news->id}, Title: " . $news->getTranslation('title', 'ka') . "\n";
} 