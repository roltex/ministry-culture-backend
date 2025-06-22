<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use Carbon\Carbon;

class TestSeeder extends Command
{
    protected $signature = 'test:seeder';
    protected $description = 'Test seeding with a single record';

    public function handle()
    {
        try {
            $project = Project::create([
                'title' => [
                    'ka' => 'ტესტ პროექტი',
                    'en' => 'Test Project'
                ],
                'description' => [
                    'ka' => 'ტესტ აღწერა',
                    'en' => 'Test description'
                ],
                'excerpt' => [
                    'ka' => 'ტესტ ექსცერპტი',
                    'en' => 'Test excerpt'
                ],
                'slug' => 'test-project-' . time(),
                'status' => 'planned',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(6),
                'budget' => 100000,
                'is_published' => true,
            ]);
            
            $this->info('Project created successfully! ID: ' . $project->id);
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
        
        return 0;
    }
} 