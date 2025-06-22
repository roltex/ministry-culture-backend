<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('legislation', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Multilingual title
            $table->json('description')->nullable(); // Multilingual description
            $table->string('category'); // Law, Regulation, Decree, etc.
            $table->string('document_number')->nullable();
            $table->date('enactment_date')->nullable();
            $table->date('effective_date')->nullable();
            $table->string('document_url'); // PDF or external link
            $table->boolean('is_active')->default(true);
            $table->integer('download_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legislation');
    }
}; 