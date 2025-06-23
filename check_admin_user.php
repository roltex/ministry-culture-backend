<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

echo "=== Admin User Check ===\n";

// Check if admin user exists
$adminUser = User::where('email', 'roland.esakia@gmail.com')->first();

if ($adminUser) {
    echo "✅ User found: {$adminUser->name}\n";
    echo "Email: {$adminUser->email}\n";
    echo "is_admin: " . ($adminUser->is_admin ? 'true' : 'false') . "\n";
    echo "is_active: " . ($adminUser->is_active ? 'true' : 'false') . "\n";
    echo "email_verified_at: " . ($adminUser->email_verified_at ? $adminUser->email_verified_at : 'null') . "\n";
    
    if (!$adminUser->is_admin) {
        echo "❌ User exists but is not admin. Updating...\n";
        $adminUser->update([
            'is_admin' => true,
            'is_active' => true,
        ]);
        echo "✅ User updated to admin!\n";
    }
} else {
    echo "❌ Admin user not found. Creating...\n";
    
    $user = User::create([
        'name' => 'Roland Esakia',
        'email' => 'roland.esakia@gmail.com',
        'password' => bcrypt('Roltex123'),
        'email_verified_at' => now(),
        'is_admin' => true,
        'is_active' => true,
    ]);
    
    echo "✅ Admin user created successfully!\n";
    echo "Name: {$user->name}\n";
    echo "Email: {$user->email}\n";
    echo "is_admin: " . ($user->is_admin ? 'true' : 'false') . "\n";
}

echo "\n=== All Users ===\n";
$allUsers = User::all();
foreach ($allUsers as $user) {
    echo "- {$user->name} ({$user->email}) - Admin: " . ($user->is_admin ? 'Yes' : 'No') . "\n";
}

echo "\n=== Done ===\n"; 