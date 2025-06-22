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
        Schema::table('subordinate_institutions', function (Blueprint $table) {
            $table->string('slug')->unique()->after('description');
            $table->json('mission')->nullable()->after('description');
            $table->json('vision')->nullable()->after('mission');
            $table->string('type')->nullable()->after('slug');
            $table->string('status')->default('active')->after('type');
            $table->string('director_name')->nullable()->after('status');
            $table->string('establishment_year')->nullable()->after('director_name');
            $table->string('facebook')->nullable()->after('website_url');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('twitter')->nullable()->after('instagram');
            $table->string('featured_image')->nullable()->after('logo');
            $table->boolean('is_published')->default(true)->after('is_active');
            $table->boolean('is_featured')->default(false)->after('is_published');
            $table->timestamp('published_at')->nullable()->after('is_featured');
            
            // Make website_url nullable since it's not always required
            $table->string('website_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subordinate_institutions', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'mission',
                'vision',
                'type',
                'status',
                'director_name',
                'establishment_year',
                'facebook',
                'instagram',
                'twitter',
                'featured_image',
                'is_published',
                'is_featured',
                'published_at',
            ]);
            
            // Make website_url required again
            $table->string('website_url')->nullable(false)->change();
        });
    }
};
