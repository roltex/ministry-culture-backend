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
        Schema::table('settings', function (Blueprint $table) {
            // Add new columns for site configuration
            $table->json('site_name')->nullable();
            $table->json('site_description')->nullable();
            $table->string('site_keywords')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->json('contact_address')->nullable();
            $table->json('working_hours')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->string('google_tag_manager_id')->nullable();
            $table->string('facebook_pixel_id')->nullable();
            $table->string('yandex_metrika_id')->nullable();
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->boolean('enable_news')->default(true);
            $table->boolean('enable_projects')->default(true);
            $table->boolean('enable_competitions')->default(true);
            $table->boolean('enable_vacancies')->default(true);
            $table->boolean('enable_legislation')->default(true);
            $table->boolean('enable_institutions')->default(true);
            $table->integer('news_per_page')->default(12);
            $table->integer('projects_per_page')->default(12);
            $table->boolean('enable_comments')->default(false);
            $table->boolean('enable_search')->default(true);
            $table->boolean('enable_newsletter')->default(false);
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('default_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'site_name', 'site_description', 'site_keywords', 'contact_email', 'contact_phone',
                'contact_address', 'working_hours', 'facebook_url', 'twitter_url', 'instagram_url',
                'youtube_url', 'linkedin_url', 'telegram_url', 'google_analytics_id', 'google_tag_manager_id',
                'facebook_pixel_id', 'yandex_metrika_id', 'meta_title', 'meta_description',
                'enable_news', 'enable_projects', 'enable_competitions', 'enable_vacancies',
                'enable_legislation', 'enable_institutions', 'news_per_page', 'projects_per_page',
                'enable_comments', 'enable_search', 'enable_newsletter', 'site_logo', 'site_favicon', 'default_image'
            ]);
        });
    }
};
