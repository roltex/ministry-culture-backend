<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class TestSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test settings functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing Settings...');

        // Check if settings table exists
        if (!Schema::hasTable('settings')) {
            $this->error('Settings table does not exist!');
            $this->info('Running migrations...');
            $this->call('migrate');
            return;
        }

        $this->info('Settings table exists ✓');

        // Check if there are any settings
        $settings = Setting::first();
        if (!$settings) {
            $this->info('No settings found, creating default settings...');
            
            try {
                $settings = Setting::create([
                    'site_name' => [
                        'ka' => 'საქართველოს კულტურის სამინისტრო',
                        'en' => 'Ministry of Culture and Sport of Georgia'
                    ],
                    'site_description' => [
                        'ka' => 'საქართველოს კულტურის სამინისტროს ოფიციალური ვებსაიტი',
                        'en' => 'Official website of the Ministry of Culture and Sport of Georgia'
                    ],
                    'contact_email' => 'info@culture.gov.ge',
                    'contact_phone' => '+995 32 2 000 000',
                    'contact_address' => [
                        'ka' => 'თბილისი, საქართველო',
                        'en' => 'Tbilisi, Georgia'
                    ],
                    'working_hours' => [
                        'ka' => 'ორშაბათი - პარასკევი, 09:00 - 18:00',
                        'en' => 'Monday - Friday, 9:00 AM - 6:00 PM'
                    ],
                    'facebook_url' => 'https://facebook.com/culturegeorgia',
                    'twitter_url' => 'https://twitter.com/culturegeorgia',
                    'instagram_url' => 'https://instagram.com/culturegeorgia',
                    'youtube_url' => 'https://youtube.com/culturegeorgia',
                    'linkedin_url' => 'https://linkedin.com/company/culturegeorgia',
                ]);
                $this->info('Default settings created successfully ✓');
            } catch (\Exception $e) {
                $this->error('Failed to create settings: ' . $e->getMessage());
                return;
            }
        } else {
            $this->info('Settings found ✓');
        }

        // Test accessing settings
        try {
            $this->info('Testing settings access...');
            $this->info('Contact Email: ' . $settings->contact_email);
            $this->info('Contact Phone: ' . $settings->contact_phone);
            $this->info('Facebook URL: ' . $settings->facebook_url);
            $this->info('Settings test completed successfully ✓');
        } catch (\Exception $e) {
            $this->error('Failed to access settings: ' . $e->getMessage());
        }
    }
} 