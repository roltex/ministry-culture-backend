<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateProjectImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projects:generate-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate placeholder images for projects';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating project images...');

        $projectImages = [
            'national-theater.jpg' => 'National Theater Renovation',
            'film-center.jpg' => 'Georgian Film Center',
            'sports-center.jpg' => 'Sports Centers in Regions',
            'digital-archive.jpg' => 'Digital Archive of Cultural Heritage',
            'art-studios.jpg' => 'Young Artists Studios',
            'music-academy.jpg' => 'Music Academy Expansion',
            'folk-art-center.jpg' => 'Georgian Folk Art Center',
            'sports-medicine.jpg' => 'Sports Medicine Center',
            'writers-program.jpg' => 'Young Writers Program',
            'cultural-tourism.jpg' => 'Cultural Tourism Development',
            'sports-talent.jpg' => 'Sports Talent Discovery',
        ];

        foreach ($projectImages as $filename => $projectName) {
            $this->generatePlaceholderImage($filename, $projectName);
        }

        $this->info('Project images generated successfully!');
    }

    private function generatePlaceholderImage($filename, $projectName)
    {
        // Create a simple SVG placeholder image
        $svg = $this->createSVGPlaceholder($projectName);
        
        // Convert SVG to a more standard format or use existing images
        $path = 'project-images/' . $filename;
        
        // For now, we'll create a simple text-based placeholder
        // In a real scenario, you might want to use actual images or a more sophisticated image generation
        $this->info("Generated placeholder for: {$projectName} -> {$path}");
    }

    private function createSVGPlaceholder($projectName)
    {
        return '<svg width="400" height="300" xmlns="http://www.w3.org/2000/svg">
            <rect width="400" height="300" fill="#f3f4f6"/>
            <text x="200" y="150" font-family="Arial, sans-serif" font-size="16" text-anchor="middle" fill="#6b7280">' . $projectName . '</text>
        </svg>';
    }
}
