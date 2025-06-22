<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\News;
use App\Models\Project;
use App\Models\Competition;
use App\Models\Vacancy;
use App\Models\Legislation;
use App\Models\SubordinateInstitution;

echo "Current Database Counts:\n";
echo "=======================\n";
echo "News: " . News::count() . "\n";
echo "Projects: " . Project::count() . "\n";
echo "Competitions: " . Competition::count() . "\n";
echo "Vacancies: " . Vacancy::count() . "\n";
echo "Legislation: " . Legislation::count() . "\n";
echo "SubordinateInstitutions: " . SubordinateInstitution::count() . "\n";

echo "\nRunning seeders...\n";

try {
    // Run seeders
    $seeder = new \Database\Seeders\ProjectSeeder();
    $seeder->run();
    echo "ProjectSeeder completed\n";
} catch (Exception $e) {
    echo "ProjectSeeder error: " . $e->getMessage() . "\n";
}

try {
    $seeder = new \Database\Seeders\CompetitionSeeder();
    $seeder->run();
    echo "CompetitionSeeder completed\n";
} catch (Exception $e) {
    echo "CompetitionSeeder error: " . $e->getMessage() . "\n";
}

try {
    $seeder = new \Database\Seeders\VacancySeeder();
    $seeder->run();
    echo "VacancySeeder completed\n";
} catch (Exception $e) {
    echo "VacancySeeder error: " . $e->getMessage() . "\n";
}

try {
    $seeder = new \Database\Seeders\LegislationSeeder();
    $seeder->run();
    echo "LegislationSeeder completed\n";
} catch (Exception $e) {
    echo "LegislationSeeder error: " . $e->getMessage() . "\n";
}

try {
    $seeder = new \Database\Seeders\SubordinateInstitutionSeeder();
    $seeder->run();
    echo "SubordinateInstitutionSeeder completed\n";
} catch (Exception $e) {
    echo "SubordinateInstitutionSeeder error: " . $e->getMessage() . "\n";
}

echo "\nFinal Database Counts:\n";
echo "=====================\n";
echo "News: " . News::count() . "\n";
echo "Projects: " . Project::count() . "\n";
echo "Competitions: " . Competition::count() . "\n";
echo "Vacancies: " . Vacancy::count() . "\n";
echo "Legislation: " . Legislation::count() . "\n";
echo "SubordinateInstitutions: " . SubordinateInstitution::count() . "\n"; 