<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subordinate_institutions', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // Multilingual name
            $table->json('description')->nullable(); // Multilingual description
            $table->string('logo')->nullable();
            $table->string('website_url');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subordinate_institutions');
    }
}; 