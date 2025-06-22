<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\News;
use App\Models\Project;
use App\Models\Competition;
use App\Models\Vacancy;
use App\Models\Legislation;
use App\Models\SubordinateInstitution;
use Illuminate\Support\Facades\Schema;

class CheckDatabaseCounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:counts {--structure : Show table structure}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the count of records in all content tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Database Record Counts:');
        $this->line('=====================');
        $this->line('News: ' . News::count());
        $this->line('Projects: ' . Project::count());
        $this->line('Competitions: ' . Competition::count());
        $this->line('Vacancies: ' . Vacancy::count());
        $this->line('Legislation: ' . Legislation::count());
        $this->line('SubordinateInstitutions: ' . SubordinateInstitution::count());
        
        if ($this->option('structure')) {
            $this->info('\nTable Structure:');
            $this->line('================');
            $this->line('Projects columns: ' . implode(', ', Schema::getColumnListing('projects')));
            $this->line('Competitions columns: ' . implode(', ', Schema::getColumnListing('competitions')));
            $this->line('Vacancies columns: ' . implode(', ', Schema::getColumnListing('vacancies')));
            $this->line('Legislation columns: ' . implode(', ', Schema::getColumnListing('legislation')));
            $this->line('SubordinateInstitutions columns: ' . implode(', ', Schema::getColumnListing('subordinate_institutions')));
        }
        
        return 0;
    }
}
