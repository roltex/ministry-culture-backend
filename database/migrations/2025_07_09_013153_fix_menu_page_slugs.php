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
        // Fix menu page_slug values to match actual page slugs
        DB::table('menus')->where('page_slug', 'about')->update(['page_slug' => 'saministros-shesaxeb']);
        DB::table('menus')->where('page_slug', 'minister')->update(['page_slug' => 'ministri']);
        // debuleba is already correct
        // kontakti is already correct
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the changes
        DB::table('menus')->where('page_slug', 'saministros-shesaxeb')->update(['page_slug' => 'about']);
        DB::table('menus')->where('page_slug', 'ministri')->update(['page_slug' => 'minister']);
    }
};
