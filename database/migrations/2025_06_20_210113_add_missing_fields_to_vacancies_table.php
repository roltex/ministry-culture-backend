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
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('employment_type')->nullable()->after('department');
            $table->string('contact_email')->nullable()->after('location');
            $table->string('contact_phone')->nullable()->after('contact_email');
            $table->date('start_date')->nullable()->after('application_deadline');
            $table->string('duration')->nullable()->after('start_date');
            $table->json('application_form')->nullable()->after('application_form_url');
            $table->boolean('is_published')->default(true)->after('is_active');
            $table->timestamp('published_at')->nullable()->after('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropColumn([
                'employment_type',
                'contact_email',
                'contact_phone',
                'start_date',
                'duration',
                'application_form',
                'is_published',
                'published_at',
            ]);
        });
    }
};
