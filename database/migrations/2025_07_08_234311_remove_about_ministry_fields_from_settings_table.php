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
            $table->dropColumn([
                'about_ministry_photo',
                'about_ministry_text_ka',
                'about_ministry_text_en'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('about_ministry_photo')->nullable()->after('default_image');
            $table->longText('about_ministry_text_ka')->nullable()->after('about_ministry_photo');
            $table->longText('about_ministry_text_en')->nullable()->after('about_ministry_text_ka');
        });
    }
};
