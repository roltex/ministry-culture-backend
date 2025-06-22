<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Multilingual title
            $table->json('description'); // Multilingual description
            $table->json('requirements')->nullable(); // Multilingual requirements
            $table->string('slug')->unique();
            $table->date('application_deadline');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('application_form_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
}; 