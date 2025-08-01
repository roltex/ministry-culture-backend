<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report;
use App\Utils\GeorgianTransliterator;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = [
            [
                'title' => [
                    'ka' => '2024 წლის კულტურის სამინისტროს ანგარიში',
                    'en' => 'Ministry of Culture Annual Report 2024'
                ],
                'description' => [
                    'ka' => '2024 წლის კულტურის სამინისტროს საქმიანობის ყოველწლიური ანგარიში. ანგარიშში წარმოდგენილია სამინისტროს მიერ განხორციელებული პროექტები, მიღწევები და მომავალი გეგმები კულტურის სფეროში.',
                    'en' => 'Annual activity report of the Ministry of Culture for 2024. The report presents projects implemented by the ministry, achievements and future plans in the field of culture.'
                ],
                'slug' => '2024-culture-ministry-report',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ღონისძიებების ანგარიში',
                    'en' => 'Sports Events Report'
                ],
                'description' => [
                    'ka' => '2024 წელს განხორციელებული სპორტული ღონისძიებების დეტალური ანგარიში. მოიცავს ეროვნულ და საერთაშორისო ღონისძიებებს, მონაწილეთა რაოდენობას და მიღწეულ შედეგებს.',
                    'en' => 'Detailed report on sports events held in 2024. Includes national and international events, number of participants and achieved results.'
                ],
                'slug' => 'sports-events-report-2024',
                'is_published' => true,
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => [
                    'ka' => 'მუზეუმების მუშაობის ანგარიში',
                    'en' => 'Museums Activity Report'
                ],
                'description' => [
                    'ka' => 'საქართველოს მუზეუმების საქმიანობის ანგარიში. ანგარიში მოიცავს ვიზიტორთა სტატისტიკას, გამოფენების რაოდენობას, განათლებითი პროგრამების მონაცემებს და ფინანსურ ინდიკატორებს.',
                    'en' => 'Report on the activities of Georgian museums. The report includes visitor statistics, number of exhibitions, educational program data and financial indicators.'
                ],
                'slug' => 'museums-activity-report',
                'is_published' => true,
                'published_at' => now()->subDays(60),
            ],
            [
                'title' => [
                    'ka' => 'თეატრალური სეზონის ანგარიში',
                    'en' => 'Theatrical Season Report'
                ],
                'description' => [
                    'ka' => '2023-2024 თეატრალური სეზონის ანგარიში. მოიცავს სახელმწიფო და კერძო თეატრების მუშაობის ანალიზს, სპექტაკლების რაოდენობას, ვიზიტორთა სტატისტიკას და ხელოვნებათა განვითარების ტენდენციებს.',
                    'en' => 'Report on the 2023-2024 theatrical season. Includes analysis of the work of state and private theaters, number of performances, visitor statistics and trends in arts development.'
                ],
                'slug' => 'theatrical-season-report-2023-2024',
                'is_published' => true,
                'published_at' => now()->subDays(90),
            ],
            [
                'title' => [
                    'ka' => 'კულტურული მემკვიდრეობის კონსერვაციის ანგარიში',
                    'en' => 'Cultural Heritage Conservation Report'
                ],
                'description' => [
                    'ka' => 'კულტურული მემკვიდრეობის კონსერვაციისა და რესტავრაციის პროექტების ანგარიში. მოიცავს ისტორიული ძეგლების, მუზეუმების ექსპონატების და კულტურული ღირებულებების დაცვის ღონისძიებებს.',
                    'en' => 'Report on cultural heritage conservation and restoration projects. Includes measures to protect historical monuments, museum exhibits and cultural values.'
                ],
                'slug' => 'cultural-heritage-conservation-report',
                'is_published' => false,
                'published_at' => null,
            ],
        ];

        foreach ($reports as $reportData) {
            Report::create($reportData);
        }
    }
} 