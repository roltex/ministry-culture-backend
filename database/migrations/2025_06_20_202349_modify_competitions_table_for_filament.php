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
        Schema::table('competitions', function (Blueprint $table) {
            // Add new columns
            $table->json('content')->after('description');
            $table->string('category')->after('slug');
            $table->decimal('prize_amount', 10, 2)->nullable()->after('category');
            $table->integer('max_participants')->nullable()->after('prize_amount');
            $table->string('contact_email')->nullable()->after('max_participants');
            $table->string('contact_phone')->nullable()->after('contact_email');
            $table->dateTime('competition_start')->nullable()->after('application_deadline');
            $table->dateTime('competition_end')->nullable()->after('competition_start');
            $table->dateTime('results_announcement')->nullable()->after('competition_end');
            $table->boolean('is_published')->default(true)->after('is_active');
            $table->timestamp('published_at')->nullable()->after('is_published');
            $table->string('application_form')->nullable()->after('featured_image');

            // Modify existing columns
            $table->json('rules')->nullable()->change(); // Renamed from requirements in form
            $table->renameColumn('rules', 'requirements');
            $table->dateTime('application_deadline')->nullable()->change();

            // Drop old column
            $table->dropColumn('application_form_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competitions', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn([
                'content',
                'category',
                'prize_amount',
                'max_participants',
                'contact_email',
                'contact_phone',
                'competition_start',
                'competition_end',
                'results_announcement',
                'is_published',
                'published_at',
                'application_form',
            ]);

            // Reverse modifications
            $table->renameColumn('requirements', 'rules');
            $table->date('application_deadline')->change();

            // Add back old column
            $table->string('application_form_url')->nullable();
        });
    }
};
