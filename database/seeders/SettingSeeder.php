<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'site_name' => [
                'ka' => 'კულტურის სამინისტრო',
                'en' => 'Ministry of Culture'
            ],
            'site_description' => [
                'ka' => 'საქართველოს კულტურის სამინისტრო',
                'en' => 'Ministry of Culture of Georgia'
            ],
            'site_keywords' => null,
            'contact_email' => 'info@culture.gov.ge',
            'contact_phone' => '+995 32 2 000 000',
            'contact_address' => null,
            'working_hours' => null,
            'facebook_url' => null,
            'twitter_url' => null,
            'instagram_url' => null,
            'youtube_url' => null,
            'linkedin_url' => null,
            'telegram_url' => null,
            'google_analytics_id' => null,
            'google_tag_manager_id' => null,
            'facebook_pixel_id' => null,
            'yandex_metrika_id' => null,
            'meta_title' => null,
            'meta_description' => null,
            'enable_news' => true,
            'enable_projects' => true,
            'enable_competitions' => true,
            'enable_vacancies' => true,
            'enable_legislation' => true,
            'enable_institutions' => true,
            'news_per_page' => 12,
            'projects_per_page' => 12,
            'enable_comments' => false,
            'enable_search' => true,
            'enable_newsletter' => false,
            'site_logo' => null,
            'site_favicon' => null,
            'default_image' => null,
        ]);
    }
} 