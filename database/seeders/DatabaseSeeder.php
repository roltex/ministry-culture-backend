<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            NewsSeeder::class,
            ProjectSeeder::class,
            CompetitionSeeder::class,
            VacancySeeder::class,
            LegislationSeeder::class,
            SubordinateInstitutionSeeder::class,
        ]);
    }
}
