<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('legal_acts', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Multilingual
            $table->json('description')->nullable(); // Multilingual
            $table->json('attachments')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_acts');
    }
}; 