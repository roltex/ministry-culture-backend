<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\News;

echo "Database Connection Check\n";
echo "========================\n\n";

// Check database connection
echo "Default DB Connection: " . config('database.default') . "\n";
echo "DB Database Path: " . config('database.connections.' . config('database.default') . '.database') . "\n\n";

// Check if the database file exists
$dbPath = config('database.connections.' . config('database.default') . '.database');
echo "Database file exists: " . (file_exists($dbPath) ? 'Yes' : 'No') . "\n";
if (file_exists($dbPath)) {
    echo "Database file size: " . filesize($dbPath) . " bytes\n";
    echo "Database file modified: " . date('Y-m-d H:i:s', filemtime($dbPath)) . "\n";
}
echo "\n";

// Check news count
echo "News Count via Model: " . News::count() . "\n";
echo "Published News Count: " . News::published()->count() . "\n\n";

// Check all news with their status
echo "All News Items:\n";
$allNews = News::orderBy('created_at', 'desc')->get();
foreach ($allNews as $news) {
    echo "- ID: {$news->id}\n";
    echo "  Title: " . $news->getTranslation('title', 'ka') . "\n";
    echo "  Is Published: " . ($news->is_published ? 'Yes' : 'No') . "\n";
    echo "  Published At: {$news->published_at}\n";
    echo "  Created At: {$news->created_at}\n";
    echo "  ---\n";
}

// Check if there are any news with future publish dates
echo "\nNews with Future Publish Dates:\n";
$futureNews = News::where('published_at', '>', now())->get();
if ($futureNews->count() > 0) {
    foreach ($futureNews as $news) {
        echo "- ID: {$news->id}, Title: " . $news->getTranslation('title', 'ka') . ", Published At: {$news->published_at}\n";
    }
} else {
    echo "None found.\n";
}

// Check if there are any unpublished news
echo "\nUnpublished News:\n";
$unpublishedNews = News::where('is_published', false)->get();
if ($unpublishedNews->count() > 0) {
    foreach ($unpublishedNews as $news) {
        echo "- ID: {$news->id}, Title: " . $news->getTranslation('title', 'ka') . "\n";
    }
} else {
    echo "None found.\n";
} 