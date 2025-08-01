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
        // Update the contact menu item to use the correct page_slug
        DB::table('menus')
            ->where('label', 'contact')
            ->update(['page_slug' => 'contact']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to the original page_slug
        DB::table('menus')
            ->where('label', 'contact')
            ->update(['page_slug' => 'kontaqti']);
    }
};
