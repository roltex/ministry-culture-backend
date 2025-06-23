<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Admin Access Test ===\n";

// Check if admin user exists and has proper privileges
$user = \App\Models\User::where('email', 'roland.esakia@gmail.com')->first();

if ($user) {
    echo "✅ User found: {$user->name}\n";
    echo "Email: {$user->email}\n";
    echo "is_admin: " . ($user->is_admin ? 'true' : 'false') . "\n";
    echo "is_active: " . ($user->is_active ? 'true' : 'false') . "\n";
    
    if (!$user->is_admin) {
        echo "❌ User is not admin. Updating...\n";
        $user->update(['is_admin' => true, 'is_active' => true]);
        echo "✅ User updated to admin!\n";
    }
} else {
    echo "❌ Admin user not found!\n";
}

// Test authentication
echo "\n=== Testing Authentication ===\n";
if (auth()->check()) {
    echo "✅ User is authenticated\n";
    echo "Authenticated user: " . auth()->user()->name . "\n";
    echo "Is admin: " . (auth()->user()->is_admin ? 'Yes' : 'No') . "\n";
} else {
    echo "❌ No user is authenticated\n";
}

// Check routes
echo "\n=== Route Information ===\n";
$router = app('router');
$routes = $router->getRoutes();

foreach ($routes as $route) {
    if (str_contains($route->uri(), 'admin')) {
        echo "Route: {$route->uri()} - Methods: " . implode(',', $route->methods()) . "\n";
    }
}

echo "\n=== Test Complete ===\n"; 