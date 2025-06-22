<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing projects with relevant featured images
        $projectImages = [
            'national-theater-renovation' => 'project-images/national-theater.jpg',
            'georgian-film-center' => 'project-images/film-center.jpg',
            'sports-centers-regions' => 'project-images/sports-center.jpg',
            'digital-archive-cultural-heritage' => 'project-images/digital-archive.jpg',
            'young-artists-studios' => 'project-images/art-studios.jpg',
            'music-academy-expansion' => 'project-images/music-academy.jpg',
            'georgian-folk-art-center' => 'project-images/folk-art-center.jpg',
            'sports-medicine-center' => 'project-images/sports-medicine.jpg',
            'young-writers-program' => 'project-images/writers-program.jpg',
            'cultural-tourism-development' => 'project-images/cultural-tourism.jpg',
            'sports-talent-discovery' => 'project-images/sports-talent.jpg',
        ];

        foreach ($projectImages as $slug => $image) {
            DB::table('projects')->where('slug', $slug)->update([
                'featured_image' => $image
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove featured images from projects
        $slugs = [
            'national-theater-renovation',
            'georgian-film-center',
            'sports-centers-regions',
            'digital-archive-cultural-heritage',
            'young-artists-studios',
            'music-academy-expansion',
            'georgian-folk-art-center',
            'sports-medicine-center',
            'young-writers-program',
            'cultural-tourism-development',
            'sports-talent-discovery',
        ];

        foreach ($slugs as $slug) {
            DB::table('projects')->where('slug', $slug)->update([
                'featured_image' => null
            ]);
        }
    }
};
