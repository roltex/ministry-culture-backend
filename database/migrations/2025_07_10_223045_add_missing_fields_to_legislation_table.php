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
            $table->json('excerpt')->nullable()->after('content');
            $table->string('status')->nullable()->after('effective_date');
            $table->string('featured_image')->nullable()->after('status');
            $table->string('document_file')->nullable()->after('featured_image');
            $table->string('document_file_ka')->nullable()->after('document_file');
            $table->string('document_file_en')->nullable()->after('document_file_ka');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('legislation', function (Blueprint $table) {
            $table->dropColumn([
                'excerpt',
                'status',
                'featured_image',
                'document_file',
                'document_file_ka',
                'document_file_en'
            ]);
        });
    }
};
