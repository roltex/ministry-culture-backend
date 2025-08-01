<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Starting data restoration...\n";

// Create a mock command object for seeders that need it
$mockCommand = new class {
    public function info($message) {
        echo "INFO: {$message}\n";
    }
    
    public function error($message) {
        echo "ERROR: {$message}\n";
    }
    
    public function warn($message) {
        echo "WARNING: {$message}\n";
    }
};

// Run all seeders
$seeders = [
    'AdminUserSeeder',
    'NewsSeeder', 
    'ProjectSeeder',
    'CompetitionSeeder',
    'VacancySeeder',
    'LegislationSeeder',
    'SubordinateInstitutionSeeder',
    'MenuSeeder',
    'ProcurementSeeder',
    'LegalActSeeder',
    'ReportSeeder',
    'CalendarSeeder',
    'MinisterStructureSeeder'
];

foreach ($seeders as $seeder) {
    echo "Running {$seeder}...\n";
    try {
        $seederClass = "Database\\Seeders\\{$seeder}";
        $seederInstance = new $seederClass();
        
        // Set the command property if it exists
        if (property_exists($seederInstance, 'command')) {
            $seederInstance->command = $mockCommand;
        }
        
        $seederInstance->run();
        echo "✓ {$seeder} completed successfully\n";
    } catch (Exception $e) {
        echo "✗ Error in {$seeder}: " . $e->getMessage() . "\n";
    }
}

echo "Data restoration completed!\n"; 