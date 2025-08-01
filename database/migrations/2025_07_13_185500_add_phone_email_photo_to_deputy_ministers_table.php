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
        Schema::table('deputy_ministers', function (Blueprint $table) {
            // Add missing columns if they don't exist
            if (!Schema::hasColumn('deputy_ministers', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('deputy_ministers', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('deputy_ministers', 'photo')) {
                $table->string('photo')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deputy_ministers', function (Blueprint $table) {
            $table->dropColumn(['phone', 'email', 'photo']);
        });
    }
}; 