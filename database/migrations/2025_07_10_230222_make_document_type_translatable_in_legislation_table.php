<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('legislation', function (Blueprint $table) {
            // Change document_type from string to JSON for translatable support
            $table->json('document_type')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('legislation', function (Blueprint $table) {
            // Revert back to string
            $table->string('document_type')->change();
        });
    }
};
