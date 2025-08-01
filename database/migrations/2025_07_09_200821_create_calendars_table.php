<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Multilingual title
            $table->json('content'); // Multilingual content
            $table->json('excerpt')->nullable(); // Multilingual excerpt
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable();
            $table->json('gallery')->nullable(); // Event gallery
            $table->json('attachments')->nullable(); // Event attachments
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('event_date')->nullable(); // Event date
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
