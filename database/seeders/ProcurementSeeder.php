<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Procurement;
use App\Utils\GeorgianTransliterator;

class ProcurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $procurements = [
            [
                'title' => [
                    'ka' => 'კულტურული ღონისძიებების ორგანიზების მომსახურების შესყიდვა',
                    'en' => 'Procurement of Cultural Event Organization Services'
                ],
                'description' => [
                    'ka' => 'სამინისტრო ეძებს კულტურული ღონისძიებების ორგანიზების მომსახურების მიმწოდებელს. მომსახურება მოიცავს ღონისძიების დაგეგმვას, ორგანიზებას და ჩატარებას.',
                    'en' => 'The ministry is seeking a provider for cultural event organization services. The service includes event planning, organization and implementation.'
                ],
                'slug' => 'cultural-events-organization',
                'is_published' => true,
                'published_at' => now(),
                'attachments' => [
                    'procurement-documents/cultural-events-tender.pdf'
                ]
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ინვენტარის შესყიდვა',
                    'en' => 'Sports Equipment Procurement'
                ],
                'description' => [
                    'ka' => 'სპორტული ინვენტარის შესყიდვა სპორტული სკოლებისთვის. მოიცავს სპორტული ტანსაცმელს, ფეხბურთის ბურთებს და სხვა სპორტულ აღჭურვილობას.',
                    'en' => 'Procurement of sports equipment for sports schools. Includes sports clothing, footballs and other sports equipment.'
                ],
                'slug' => 'sports-equipment-procurement',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'attachments' => [
                    'procurement-documents/sports-equipment-specs.pdf',
                    'procurement-documents/sports-equipment-requirements.pdf'
                ]
            ],
            [
                'title' => [
                    'ka' => 'მუზეუმის რენოვაციის სამუშაოები',
                    'en' => 'Museum Renovation Works'
                ],
                'description' => [
                    'ka' => 'ეროვნული მუზეუმის რენოვაციის სამუშაოების შესრულება. მოიცავს შენობის რესტავრაციას, ელექტრო სისტემის განახლებას და უსაფრთხოების სისტემების დამონტაჟებას.',
                    'en' => 'Execution of renovation works for the National Museum. Includes building restoration, electrical system upgrade and installation of security systems.'
                ],
                'slug' => 'museum-renovation-works',
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'attachments' => [
                    'procurement-documents/museum-renovation-plan.pdf',
                    'procurement-documents/museum-technical-specs.pdf',
                    'procurement-documents/museum-budget-estimate.pdf'
                ]
            ]
        ];

        foreach ($procurements as $procurementData) {
            // Generate slug if not provided
            if (empty($procurementData['slug'])) {
                $procurementData['slug'] = GeorgianTransliterator::generateSlug($procurementData['title']['ka']);
            }

            Procurement::create($procurementData);
        }
    }
} 