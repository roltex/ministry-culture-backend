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
        // Update existing projects with proper Georgian location data
        DB::table('projects')->where('slug', 'national-theater-renovation')->update([
            'location' => 'თბილისი, რუსთაველის გამზირი'
        ]);
        
        DB::table('projects')->where('slug', 'georgian-film-center')->update([
            'location' => 'თბილისი, ვაჟა-ფშაველას გამზირი'
        ]);
        
        DB::table('projects')->where('slug', 'sports-centers-regions')->update([
            'location' => 'საქართველოს რეგიონები'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the location data
        DB::table('projects')->where('slug', 'national-theater-renovation')->update([
            'location' => null
        ]);
        
        DB::table('projects')->where('slug', 'georgian-film-center')->update([
            'location' => null
        ]);
        
        DB::table('projects')->where('slug', 'sports-centers-regions')->update([
            'location' => null
        ]);
    }
};
