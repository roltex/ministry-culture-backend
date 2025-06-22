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
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
        Schema::table('legislation', function (Blueprint $table) {
            $table->json('title');
            $table->json('description')->nullable();
            $table->json('content')->nullable()->after('description');
            $table->string('slug')->after('content');
            $table->boolean('is_published')->default(true)->after('download_count');
            $table->timestamp('published_at')->nullable()->after('is_published');

            // Rename columns to match seeder
            $table->renameColumn('category', 'document_type');
            $table->renameColumn('document_number', 'act_number');
            $table->renameColumn('enactment_date', 'adoption_date');
            $table->dropColumn('document_url');
            $table->dropColumn('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('legislation', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->string('title');
            $table->string('description')->nullable();
            $table->dropColumn('content');
            $table->dropColumn('slug');
            $table->dropColumn('is_published');
            $table->dropColumn('published_at');

            $table->renameColumn('document_type', 'category');
            $table->renameColumn('act_number', 'document_number');
            $table->renameColumn('adoption_date', 'enactment_date');
            $table->string('document_url')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }
}; 