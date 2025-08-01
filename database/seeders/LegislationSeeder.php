<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Legislation;
use Carbon\Carbon;

class LegislationSeeder extends Seeder
{
    public function run(): void
    {
        $legislations = [
            [
                'title' => [
                    'ka' => 'კულტურული მემკვიდრეობის დაცვის შესახებ',
                    'en' => 'On Protection of Cultural Heritage'
                ],
                'description' => [
                    'ka' => '<p>კულტურული მემკვიდრეობის დაცვის შესახებ კანონი, რომელიც განსაზღვრავს კულტურული ძეგლების დაცვის პრინციპებს, პასუხისმგებლობებს და ზომებს.</p><p>კანონი მოიცავს ისტორიული, არქიტექტურული და არქეოლოგიური ძეგლების დაცვას.</p>',
                    'en' => '<p>Law on Protection of Cultural Heritage, which defines the principles, responsibilities, and measures for the protection of cultural monuments.</p><p>The law covers the protection of historical, architectural, and archaeological monuments.</p>'
                ],
                'content' => [
                    'ka' => '<p>კულტურული მემკვიდრეობის დაცვის შესახებ კანონის სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Law on Protection of Cultural Heritage...</p>'
                ],
                'slug' => 'cultural-heritage-protection-law',
                'act_number' => '1234-რს',
                'document_type' => [
                    'ka' => 'კანონი',
                    'en' => 'Law'
                ],
                'adoption_date' => Carbon::now()->subYears(2),
                'effective_date' => Carbon::now()->subYears(2)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subYears(2),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'სპორტის განვითარების შესახებ',
                    'en' => 'On Sports Development'
                ],
                'description' => [
                    'ka' => '<p>სპორტის განვითარების შესახებ კანონი, რომელიც განსაზღვრავს სპორტის განვითარების პრინციპებს, ფინანსირების წყაროებს და სპორტსმენების მხარდაჭერის ზომებს.</p><p>კანონი მოიცავს პროფესიონალურ და სამოყვარულო სპორტს.</p>',
                    'en' => '<p>Law on Sports Development, which defines the principles of sports development, funding sources, and measures to support athletes.</p><p>The law covers professional and amateur sports.</p>'
                ],
                'content' => [
                    'ka' => '<p>სპორტის განვითარების შესახებ კანონის სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Sports Development Law...</p>'
                ],
                'slug' => 'sports-development-law',
                'act_number' => '5678-რს',
                'document_type' => [
                    'ka' => 'კანონი',
                    'en' => 'Law'
                ],
                'adoption_date' => Carbon::now()->subYears(1),
                'effective_date' => Carbon::now()->subYears(1)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subYears(1),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'მუზეუმების შესახებ',
                    'en' => 'On Museums'
                ],
                'description' => [
                    'ka' => '<p>მუზეუმების შესახებ კანონი, რომელიც განსაზღვრავს მუზეუმების ფუნქციებს, მართვის პრინციპებს და ექსპონატების დაცვის ზომებს.</p><p>კანონი მოიცავს სახელმწიფო და კერძო მუზეუმებს.</p>',
                    'en' => '<p>Law on Museums, which defines the functions of museums, management principles, and measures for the protection of exhibits.</p><p>The law covers state and private museums.</p>'
                ],
                'content' => [
                    'ka' => '<p>მუზეუმების შესახებ კანონის სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Museums Law...</p>'
                ],
                'slug' => 'museums-law',
                'act_number' => '9012-რს',
                'document_type' => [
                    'ka' => 'კანონი',
                    'en' => 'Law'
                ],
                'adoption_date' => Carbon::now()->subMonths(18),
                'effective_date' => Carbon::now()->subMonths(18)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(18),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდობის პოლიტიკის შესახებ',
                    'en' => 'On Youth Policy'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდობის პოლიტიკის შესახებ კანონი, რომელიც განსაზღვრავს ახალგაზრდების მხარდაჭერის პრინციპებს, პროგრამებს და ფინანსირების წყაროებს.</p><p>კანონი მოიცავს განათლების, კულტურის და სპორტის სფეროებს.</p>',
                    'en' => '<p>Law on Youth Policy, which defines the principles of youth support, programs, and funding sources.</p><p>The law covers education, culture, and sports sectors.</p>'
                ],
                'content' => [
                    'ka' => '<p>ახალგაზრდობის პოლიტიკის შესახებ კანონის სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Youth Policy Law...</p>'
                ],
                'slug' => 'youth-policy-law',
                'act_number' => '3456-რს',
                'document_type' => [
                    'ka' => 'კანონი',
                    'en' => 'Law'
                ],
                'adoption_date' => Carbon::now()->subMonths(12),
                'effective_date' => Carbon::now()->subMonths(12)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(12),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'ხელოვნების ნაწარმოებების ავტორული უფლებების შესახებ',
                    'en' => 'On Copyright of Artistic Works'
                ],
                'description' => [
                    'ka' => '<p>ხელოვნების ნაწარმოებების ავტორული უფლებების შესახებ კანონი, რომელიც განსაზღვრავს ავტორული უფლებების დაცვის პრინციპებს და ზომებს.</p><p>კანონი მოიცავს ლიტერატურას, მუსიკას, ფილმებს და ვიზუალურ ხელოვნებას.</p>',
                    'en' => '<p>Law on Copyright of Artistic Works, which defines the principles and measures for the protection of copyright.</p><p>The law covers literature, music, films, and visual arts.</p>'
                ],
                'content' => [
                    'ka' => '<p>ავტორული უფლებების შესახებ კანონის სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Copyright Law...</p>'
                ],
                'slug' => 'copyright-law',
                'act_number' => '7890-რს',
                'document_type' => [
                    'ka' => 'კანონი',
                    'en' => 'Law'
                ],
                'adoption_date' => Carbon::now()->subMonths(6),
                'effective_date' => Carbon::now()->subMonths(6)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(6),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ღონისძიებების ორგანიზების შესახებ',
                    'en' => 'On Organization of Cultural Events'
                ],
                'description' => [
                    'ka' => '<p>კულტურული ღონისძიებების ორგანიზების შესახებ დებულება, რომელიც განსაზღვრავს ღონისძიებების ორგანიზების წესებს, უსაფრთხოების ზომებს და ფინანსირების პრინციპებს.</p><p>დებულება მოიცავს ფესტივალებს, კონცერტებს და გამოფენებს.</p>',
                    'en' => '<p>Regulation on Organization of Cultural Events, which defines the rules for organizing events, security measures, and funding principles.</p><p>The regulation covers festivals, concerts, and exhibitions.</p>'
                ],
                'content' => [
                    'ka' => '<p>კულტურული ღონისძიებების ორგანიზების შესახებ დებულების სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Cultural Events Organization Regulation...</p>'
                ],
                'slug' => 'cultural-events-regulation',
                'act_number' => '2345-დ',
                'document_type' => [
                    'ka' => 'დებულება',
                    'en' => 'Regulation'
                ],
                'adoption_date' => Carbon::now()->subMonths(9),
                'effective_date' => Carbon::now()->subMonths(9)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(9),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ობიექტების მართვის შესახებ',
                    'en' => 'On Management of Sports Facilities'
                ],
                'description' => [
                    'ka' => '<p>სპორტული ობიექტების მართვის შესახებ დებულება, რომელიც განსაზღვრავს სპორტული ობიექტების მართვის წესებს, უსაფრთხოების სტანდარტებს და მომსახურების პრინციპებს.</p><p>დებულება მოიცავს სტადიონებს, სპორტულ დარბაზებს და საცურაო აუზებს.</p>',
                    'en' => '<p>Regulation on Management of Sports Facilities, which defines the rules for managing sports facilities, safety standards, and service principles.</p><p>The regulation covers stadiums, sports halls, and swimming pools.</p>'
                ],
                'content' => [
                    'ka' => '<p>სპორტული ობიექტების მართვის შესახებ დებულების სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Sports Facilities Management Regulation...</p>'
                ],
                'slug' => 'sports-facilities-regulation',
                'act_number' => '4567-დ',
                'document_type' => [
                    'ka' => 'დებულება',
                    'en' => 'Regulation'
                ],
                'adoption_date' => Carbon::now()->subMonths(3),
                'effective_date' => Carbon::now()->subMonths(3)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(3),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'კულტურული მემკვიდრეობის რესტავრაციის შესახებ',
                    'en' => 'On Restoration of Cultural Heritage'
                ],
                'description' => [
                    'ka' => '<p>კულტურული მემკვიდრეობის რესტავრაციის შესახებ დებულება, რომელიც განსაზღვრავს რესტავრაციის სტანდარტებს, პროცედურებს და ხარისხის კონტროლს.</p><p>დებულება მოიცავს არქიტექტურული და არქეოლოგიური ძეგლების რესტავრაციას.</p>',
                    'en' => '<p>Regulation on Restoration of Cultural Heritage, which defines restoration standards, procedures, and quality control.</p><p>The regulation covers restoration of architectural and archaeological monuments.</p>'
                ],
                'content' => [
                    'ka' => '<p>კულტურული მემკვიდრეობის რესტავრაციის შესახებ დებულების სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Cultural Heritage Restoration Regulation...</p>'
                ],
                'slug' => 'cultural-heritage-restoration-regulation',
                'act_number' => '6789-დ',
                'document_type' => [
                    'ka' => 'დებულება',
                    'en' => 'Regulation'
                ],
                'adoption_date' => Carbon::now()->subMonths(6),
                'effective_date' => Carbon::now()->subMonths(6)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(6),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'სპორტსმენების მხარდაჭერის შესახებ',
                    'en' => 'On Support of Athletes'
                ],
                'description' => [
                    'ka' => '<p>სპორტსმენების მხარდაჭერის შესახებ დებულება, რომელიც განსაზღვრავს სპორტსმენების მხარდაჭერის პროგრამებს, ფინანსირების წყაროებს და სტიპენდიების გაცემის წესებს.</p><p>დებულება მოიცავს პროფესიონალურ და ახალგაზრდა სპორტსმენებს.</p>',
                    'en' => '<p>Regulation on Support of Athletes, which defines athlete support programs, funding sources, and scholarship distribution rules.</p><p>The regulation covers professional and young athletes.</p>'
                ],
                'content' => [
                    'ka' => '<p>სპორტსმენების მხარდაჭერის შესახებ დებულების სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Athletes Support Regulation...</p>'
                ],
                'slug' => 'athletes-support-regulation',
                'act_number' => '8901-დ',
                'document_type' => [
                    'ka' => 'დებულება',
                    'en' => 'Regulation'
                ],
                'adoption_date' => Carbon::now()->subMonths(4),
                'effective_date' => Carbon::now()->subMonths(4)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(4),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ტურიზმის განვითარების შესახებ',
                    'en' => 'On Development of Cultural Tourism'
                ],
                'description' => [
                    'ka' => '<p>კულტურული ტურიზმის განვითარების შესახებ დებულება, რომელიც განსაზღვრავს კულტურული ტურიზმის განვითარების სტრატეგიას, პროგრამებს და ფინანსირების წყაროებს.</p><p>დებულება მოიცავს ისტორიული ძეგლების და მუზეუმების ტურიზმს.</p>',
                    'en' => '<p>Regulation on Development of Cultural Tourism, which defines the strategy, programs, and funding sources for the development of cultural tourism.</p><p>The regulation covers tourism of historical monuments and museums.</p>'
                ],
                'content' => [
                    'ka' => '<p>კულტურული ტურიზმის განვითარების შესახებ დებულების სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Cultural Tourism Development Regulation...</p>'
                ],
                'slug' => 'cultural-tourism-development-regulation',
                'act_number' => '0123-დ',
                'document_type' => [
                    'ka' => 'დებულება',
                    'en' => 'Regulation'
                ],
                'adoption_date' => Carbon::now()->subMonths(2),
                'effective_date' => Carbon::now()->subMonths(2)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(2),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა ხელოვანების მხარდაჭერის შესახებ',
                    'en' => 'On Support of Young Artists'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა ხელოვანების მხარდაჭერის შესახებ დებულება, რომელიც განსაზღვრავს ახალგაზრდა ხელოვანების მხარდაჭერის პროგრამებს, გრანტების გაცემის წესებს და ტრენინგების ორგანიზებას.</p><p>დებულება მოიცავს მხატვრებს, მუსიკოსებს და მწერლებს.</p>',
                    'en' => '<p>Regulation on Support of Young Artists, which defines programs to support young artists, grant distribution rules, and organization of training.</p><p>The regulation covers artists, musicians, and writers.</p>'
                ],
                'content' => [
                    'ka' => '<p>ახალგაზრდა ხელოვანების მხარდაჭერის შესახებ დებულების სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Young Artists Support Regulation...</p>'
                ],
                'slug' => 'young-artists-support-regulation',
                'act_number' => '1357-დ',
                'document_type' => [
                    'ka' => 'დებულება',
                    'en' => 'Regulation'
                ],
                'adoption_date' => Carbon::now()->subMonths(1),
                'effective_date' => Carbon::now()->subMonths(1)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subMonths(1),
                'download_count' => 0,
            ],
            [
                'title' => [
                    'ka' => 'სპორტული მედიცინის სტანდარტების შესახებ',
                    'en' => 'On Sports Medicine Standards'
                ],
                'description' => [
                    'ka' => '<p>სპორტული მედიცინის სტანდარტების შესახებ დებულება, რომელიც განსაზღვრავს სპორტული მედიცინის სტანდარტებს, პროცედურებს და ხარისხის კონტროლს.</p><p>დებულება მოიცავს დიაგნოსტიკას, რეაბილიტაციას და პრევენციას.</p>',
                    'en' => '<p>Regulation on Sports Medicine Standards, which defines sports medicine standards, procedures, and quality control.</p><p>The regulation covers diagnostics, rehabilitation, and prevention.</p>'
                ],
                'content' => [
                    'ka' => '<p>სპორტული მედიცინის სტანდარტების შესახებ დებულების სრული ტექსტი...</p>',
                    'en' => '<p>Full text of the Sports Medicine Standards Regulation...</p>'
                ],
                'slug' => 'sports-medicine-standards-regulation',
                'act_number' => '2468-დ',
                'document_type' => [
                    'ka' => 'დებულება',
                    'en' => 'Regulation'
                ],
                'adoption_date' => Carbon::now()->subWeeks(2),
                'effective_date' => Carbon::now()->subWeeks(2)->addDays(30),
                'is_published' => true,
                'published_at' => Carbon::now()->subWeeks(2),
                'download_count' => 0,
            ],
        ];

        foreach ($legislations as $legislation) {
            Legislation::create($legislation);
        }
    }
} 