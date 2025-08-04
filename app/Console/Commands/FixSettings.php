<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;

class FixSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix settings by properly encoding multilingual fields as JSON';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fixing Settings...');

        $settings = Setting::first();
        
        if (!$settings) {
            $this->error('No settings found!');
            return;
        }

        try {
            // Update with properly encoded JSON
            $settings->update([
                'site_name' => json_encode([
                    'ka' => 'საქართველოს კულტურის სამინისტრო',
                    'en' => 'Ministry of Culture of Georgia'
                ]),
                'site_description' => json_encode([
                    'ka' => 'საქართველოს კულტურის სამინისტროს ოფიციალური ვებსაიტი',
                    'en' => 'Official website of the Ministry of Culture of Georgia'
                ]),
                'contact_address' => json_encode([
                    'ka' => 'თბილისი, საქართველო',
                    'en' => 'Tbilisi, Georgia'
                ]),
                'working_hours' => json_encode([
                    'ka' => 'ორშაბათი - პარასკევი, 09:00 - 18:00',
                    'en' => 'Monday - Friday, 9:00 AM - 6:00 PM'
                ]),
                'facebook_url' => 'https://facebook.com/culturegeorgia',
                'twitter_url' => 'https://twitter.com/culturegeorgia',
                'instagram_url' => 'https://instagram.com/culturegeorgia',
                'youtube_url' => 'https://youtube.com/culturegeorgia',
                'linkedin_url' => 'https://linkedin.com/company/culturegeorgia',
            ]);

            $this->info('Settings fixed successfully ✓');
            
            // Test the fixed settings
            $this->info('Testing fixed settings...');
            $this->info('Contact Email: ' . $settings->contact_email);
            $this->info('Contact Phone: ' . $settings->contact_phone);
            
            // Test JSON decoding
            $addressData = json_decode($settings->contact_address, true);
            $this->info('Contact Address (KA): ' . ($addressData['ka'] ?? 'Not set'));
            $this->info('Contact Address (EN): ' . ($addressData['en'] ?? 'Not set'));
            
            $workingHoursData = json_decode($settings->working_hours, true);
            $this->info('Working Hours (KA): ' . ($workingHoursData['ka'] ?? 'Not set'));
            $this->info('Working Hours (EN): ' . ($workingHoursData['en'] ?? 'Not set'));
            
            $this->info('Facebook URL: ' . $settings->facebook_url);
            
        } catch (\Exception $e) {
            $this->error('Failed to fix settings: ' . $e->getMessage());
        }
    }
} 