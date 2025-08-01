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
        Schema::create('ministry_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Translatable
            $table->text('description')->nullable(); // Translatable
            $table->string('address')->nullable(); // Translatable
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('ministry_structures')->onDelete('cascade');
        });

        // Attachments table (many-to-one with ministry_structures)
        Schema::create('ministry_structure_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ministry_structure_id');
            $table->string('file');
            $table->string('name')->nullable(); // Optional display name
            $table->timestamps();
            $table->foreign('ministry_structure_id')->references('id')->on('ministry_structures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministry_structure_attachments');
        Schema::dropIfExists('ministry_structures');
    }
};
