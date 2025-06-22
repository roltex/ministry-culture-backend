<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Drop unique index if it exists (for SQLite compatibility)
            try {
                $table->dropUnique(['key']);
            } catch (\Throwable $e) {}
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['key', 'value', 'type', 'group']);
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('key')->nullable();
            $table->text('value')->nullable();
            $table->string('type')->nullable();
            $table->string('group')->nullable();
            $table->unique('key');
        });
    }
}; 