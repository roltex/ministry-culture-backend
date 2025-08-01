<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Http\Controllers\Api\NewsController;

// Test the news API
$controller = new NewsController();

echo "Testing News API...\n\n";

try {
    $response = $controller->index();
    $data = $response->response()->getData();
    
    echo "API Response:\n";
    echo "Total: " . $data->meta->total . "\n";
    echo "Current Page: " . $data->meta->current_page . "\n";
    echo "Per Page: " . $data->meta->per_page . "\n\n";
    
    echo "News Items:\n";
    foreach ($data->data as $news) {
        echo "- ID: {$news->id}\n";
        echo "  Title: {$news->title}\n";
        echo "  Slug: {$news->slug}\n";
        echo "  Published At: {$news->published_at}\n";
        echo "  ---\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
} 