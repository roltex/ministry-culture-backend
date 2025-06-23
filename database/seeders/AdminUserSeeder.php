<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $adminUser = User::where('email', 'roland.esakia@gmail.com')->first();
        
        if (!$adminUser) {
            User::create([
                'name' => 'Roland Esakia',
                'email' => 'roland.esakia@gmail.com',
                'password' => Hash::make('Roltex123'),
                'email_verified_at' => now(),
                'is_admin' => true,
                'is_active' => true,
            ]);
            
            $this->command->info('Admin user created successfully!');
        } else {
            // Update existing user to be admin if not already
            if (!$adminUser->is_admin) {
                $adminUser->update([
                    'is_admin' => true,
                    'is_active' => true,
                ]);
                $this->command->info('Existing user updated to admin!');
            } else {
                $this->command->info('Admin user already exists.');
            }
        }
    }
} 