<?php

namespace Database\Seeders;

use App\Models\LegalAct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LegalActSeeder extends Seeder
{
    public function run(): void
    {
        $legalActs = [
            [
                'title' => [
                    'ka' => 'კულტურის სფეროში სახელმწიფო პოლიტიკის შესახებ',
                    'en' => 'On State Policy in the Field of Culture'
                ],
                'description' => [
                    'ka' => 'ეს სამართლებრივი აქტი განსაზღვრავს სახელმწიფო პოლიტიკის ძირითად პრინციპებს კულტურის სფეროში, მათ შორის კულტურული მემკვიდრეობის დაცვას, ხელოვნების განვითარებას და კულტურული ინდუსტრიების მხარდაჭერას.',
                    'en' => 'This legal act defines the main principles of state policy in the field of culture, including the protection of cultural heritage, development of arts, and support for cultural industries.'
                ],
                'slug' => 'state-policy-culture',
                'is_published' => true,
                'published_at' => now()->subDays(30),
                'attachments' => ['legal-act-attachments/01JZP8AA6YR7Q6QCKV85CBNG2C.pdf']
            ],
            [
                'title' => [
                    'ka' => 'მუზეუმების საქმიანობის რეგულირების შესახებ',
                    'en' => 'On Regulation of Museum Activities'
                ],
                'description' => [
                    'ka' => 'სამართლებრივი აქტი, რომელიც ადგენს მუზეუმების საქმიანობის წესებს, კოლექციების მართვის პრინციპებს და მუზეუმების ფუნქციონირების სტანდარტებს.',
                    'en' => 'Legal act that establishes the rules for museum activities, principles of collection management, and standards for museum operation.'
                ],
                'slug' => 'museum-activities-regulation',
                'is_published' => true,
                'published_at' => now()->subDays(25),
                'attachments' => ['legal-act-attachments/01JZP8AA6YR7Q6QCKV85CBNG2D.pdf']
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ღონისძიებების ორგანიზების წესები',
                    'en' => 'Rules for Organizing Cultural Events'
                ],
                'description' => [
                    'ka' => 'დოკუმენტი, რომელიც განსაზღვრავს კულტურული ღონისძიებების ორგანიზების პროცედურას, უსაფრთხოების ზომებს და ღონისძიების ჩატარების სტანდარტებს.',
                    'en' => 'Document that defines the procedure for organizing cultural events, security measures, and standards for event implementation.'
                ],
                'slug' => 'cultural-events-organization-rules',
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'attachments' => ['legal-act-attachments/01JZP8AA6YR7Q6QCKV85CBNG2E.pdf']
            ],
            [
                'title' => [
                    'ka' => 'ხელოვნების ნიმუშების ექსპორტის რეგულირების შესახებ',
                    'en' => 'On Regulation of Artwork Export'
                ],
                'description' => [
                    'ka' => 'სამართლებრივი აქტი, რომელიც ადგენს ხელოვნების ნიმუშების ექსპორტის წესებს, კულტურული ღირებულებების დაცვის ზომებს და საექსპორტო ლიცენზიების გაცემის პროცედურას.',
                    'en' => 'Legal act that establishes rules for artwork export, measures for protection of cultural values, and procedures for issuing export licenses.'
                ],
                'slug' => 'artwork-export-regulation',
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'attachments' => ['legal-act-attachments/01JZP8AA6YR7Q6QCKV85CBNG2F.pdf']
            ],
            [
                'title' => [
                    'ka' => 'კულტურული მემკვიდრეობის დაცვის შესახებ',
                    'en' => 'On Protection of Cultural Heritage'
                ],
                'description' => [
                    'ka' => 'საფუძვლიანი დოკუმენტი, რომელიც განსაზღვრავს კულტურული მემკვიდრეობის ობიექტების დაცვის ზომებს, რესტავრაციის სტანდარტებს და კულტურული ღირებულებების კონსერვაციის პრინციპებს.',
                    'en' => 'Comprehensive document that defines measures for protection of cultural heritage objects, restoration standards, and principles of cultural value conservation.'
                ],
                'slug' => 'cultural-heritage-protection',
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'attachments' => ['legal-act-attachments/01JZP8AA6YR7Q6QCKV85CBNG2G.pdf']
            ]
        ];

        foreach ($legalActs as $legalAct) {
            LegalAct::create($legalAct);
        }
    }
} 