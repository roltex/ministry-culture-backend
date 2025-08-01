<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\News;

echo "Checking recent news...\n\n";

// Get the 5 most recent news items
$recentNews = News::orderBy('created_at', 'desc')->limit(5)->get();

echo "5 Most Recent News Items:\n";
echo "========================\n\n";

foreach ($recentNews as $news) {
    echo "ID: {$news->id}\n";
    echo "Title (KA): " . $news->getTranslation('title', 'ka') . "\n";
    echo "Title (EN): " . $news->getTranslation('title', 'en') . "\n";
    echo "Slug: {$news->slug}\n";
    echo "Is Published: " . ($news->is_published ? 'Yes' : 'No') . "\n";
    echo "Published At: {$news->published_at}\n";
    echo "Created At: {$news->created_at}\n";
    echo "Updated At: {$news->updated_at}\n";
    echo "Current Time: " . now() . "\n";
    echo "Is Published Now: " . (News::published()->where('id', $news->id)->exists() ? 'Yes' : 'No') . "\n";
    echo "---\n\n";
}

// Check if there are any news items created today
$todayNews = News::whereDate('created_at', today())->get();
echo "News Created Today: " . $todayNews->count() . "\n\n";

if ($todayNews->count() > 0) {
    echo "Today's News:\n";
    foreach ($todayNews as $news) {
        echo "- ID: {$news->id}, Title: " . $news->getTranslation('title', 'ka') . "\n";
    }
} 