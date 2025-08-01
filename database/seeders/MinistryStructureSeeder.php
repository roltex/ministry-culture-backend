<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MinistryStructure;
use App\Models\MinistryStructureAttachment;

class MinistryStructureSeeder extends Seeder
{
    public function run(): void
    {
        // Clear previous data
        MinistryStructureAttachment::truncate();
        MinistryStructure::truncate();

        // Root structure
        $root = MinistryStructure::create([
            'name' => [
                'ka' => 'კულტურის სამინისტრო',
                'en' => 'Ministry of Culture',
            ],
            'description' => [
                'ka' => 'საქართველოს კულტურის სამინისტროს მთავარი სტრუქტურა.',
                'en' => 'Main structure of the Ministry of Culture of Georgia.',
            ],
            'address' => [
                'ka' => 'თბილისი, საქართველო',
                'en' => 'Tbilisi, Georgia',
            ],
            'email' => 'info@culture.gov.ge',
            'phone' => '+995 32 2 000 000',
            'facebook_url' => 'https://facebook.com/culturege',
            'twitter_url' => 'https://twitter.com/culturege',
            'instagram_url' => 'https://instagram.com/culturege',
            'linkedin_url' => null,
            'youtube_url' => null,
            'telegram_url' => null,
            'image' => null,
            'parent_id' => null,
        ]);
        $root->attachments()->createMany([
            [
                'file' => 'sample1.pdf',
                'name' => 'სამინისტროს დოკუმენტი 1',
            ],
            [
                'file' => 'sample2.pdf',
                'name' => 'სამინისტროს დოკუმენტი 2',
            ],
        ]);

        // Child structures
        $dep1 = MinistryStructure::create([
            'name' => [
                'ka' => 'ხელოვნების დეპარტამენტი',
                'en' => 'Department of Arts',
            ],
            'description' => [
                'ka' => 'ხელოვნების დეპარტამენტის აღწერა.',
                'en' => 'Description of the Department of Arts.',
            ],
            'address' => [
                'ka' => 'თბილისი, რუსთაველის გამზირი 1',
                'en' => 'Tbilisi, Rustaveli Ave 1',
            ],
            'email' => 'arts@culture.gov.ge',
            'phone' => '+995 32 2 111 111',
            'facebook_url' => null,
            'twitter_url' => null,
            'instagram_url' => null,
            'linkedin_url' => null,
            'youtube_url' => null,
            'telegram_url' => null,
            'image' => null,
            'parent_id' => $root->id,
        ]);
        $dep1->attachments()->create([
            'file' => 'arts-dep.pdf',
            'name' => 'ხელოვნების დეპარტამენტის დოკუმენტი',
        ]);

        $dep2 = MinistryStructure::create([
            'name' => [
                'ka' => 'მემკვიდრეობის დეპარტამენტი',
                'en' => 'Department of Heritage',
            ],
            'description' => [
                'ka' => 'მემკვიდრეობის დეპარტამენტის აღწერა.',
                'en' => 'Description of the Department of Heritage.',
            ],
            'address' => [
                'ka' => 'თბილისი, თავისუფლების მოედანი 2',
                'en' => 'Tbilisi, Freedom Sq 2',
            ],
            'email' => 'heritage@culture.gov.ge',
            'phone' => '+995 32 2 222 222',
            'facebook_url' => null,
            'twitter_url' => null,
            'instagram_url' => null,
            'linkedin_url' => null,
            'youtube_url' => null,
            'telegram_url' => null,
            'image' => null,
            'parent_id' => $root->id,
        ]);

        // Sub-child
        $dep1_1 = MinistryStructure::create([
            'name' => [
                'ka' => 'საბავშვო ხელოვნების განყოფილება',
                'en' => 'Children Arts Division',
            ],
            'description' => [
                'ka' => 'საბავშვო ხელოვნების განყოფილების აღწერა.',
                'en' => 'Description of Children Arts Division.',
            ],
            'address' => [
                'ka' => 'თბილისი, რუსთაველის გამზირი 1',
                'en' => 'Tbilisi, Rustaveli Ave 1',
            ],
            'email' => 'children@culture.gov.ge',
            'phone' => '+995 32 2 333 333',
            'facebook_url' => null,
            'twitter_url' => null,
            'instagram_url' => null,
            'linkedin_url' => null,
            'youtube_url' => null,
            'telegram_url' => null,
            'image' => null,
            'parent_id' => $dep1->id,
        ]);
    }
}
