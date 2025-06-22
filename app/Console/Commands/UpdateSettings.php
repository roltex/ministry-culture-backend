<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;

class UpdateSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update settings with proper multilingual content';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating Settings...');

        $settings = Setting::first();
        
        if (!$settings) {
            $this->error('No settings found!');
            return;
        }

        try {
            $settings->update([
                'site_name' => [
                    'ka' => 'საქართველოს კულტურის სამინისტრო',
                    'en' => 'Ministry of Culture and Sport of Georgia'
                ],
                'site_description' => [
                    'ka' => 'საქართველოს კულტურის სამინისტროს ოფიციალური ვებსაიტი',
                    'en' => 'Official website of the Ministry of Culture and Sport of Georgia'
                ],
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

            $this->info('Settings updated successfully ✓');
            
            // Test the updated settings
            $this->info('Testing updated settings...');
            $this->info('Contact Email: ' . $settings->contact_email);
            $this->info('Contact Phone: ' . $settings->contact_phone);
            $this->info('Contact Address (KA): ' . ($settings->contact_address['ka'] ?? 'Not set'));
            $this->info('Contact Address (EN): ' . ($settings->contact_address['en'] ?? 'Not set'));
            $this->info('Working Hours (KA): ' . ($settings->working_hours['ka'] ?? 'Not set'));
            $this->info('Working Hours (EN): ' . ($settings->working_hours['en'] ?? 'Not set'));
            $this->info('Facebook URL: ' . $settings->facebook_url);
            
        } catch (\Exception $e) {
            $this->error('Failed to update settings: ' . $e->getMessage());
        }
    }
} 