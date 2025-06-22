<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vacancy;
use Carbon\Carbon;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vacancies = [
            [
                'title' => [
                    'ka' => 'კულტურის სამინისტროს მთავარი სპეციალისტი',
                    'en' => 'Senior Specialist at Ministry of Culture'
                ],
                'description' => [
                    'ka' => '<p>კულტურის სამინისტროში მთავარი სპეციალისტის პოზიცია. მოვალეობები მოიცავს კულტურული პროექტების მართვას, ბიუჯეტის დაგეგმვას და საერთაშორისო თანამშრომლობის კოორდინაციას.</p><p>საჭიროა უმაღლესი განათლება კულტურის ან მართვის სფეროში და მინიმუმ 5 წლის გამოცდილება.</p>',
                    'en' => '<p>Senior Specialist position at the Ministry of Culture. Responsibilities include managing cultural projects, budget planning, and coordinating international cooperation.</p><p>Higher education in culture or management field and minimum 5 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'უმაღლესი განათლება კულტურის ან მართვის სფეროში, მინიმუმ 5 წლის გამოცდილება, კომპიუტერული უნარები',
                    'en' => 'Higher education in culture or management field, minimum 5 years of experience, computer skills'
                ],
                'slug' => 'senior-specialist-ministry-culture',
                'application_deadline' => Carbon::now()->addMonths(1),
                'department' => 'კულტურული პროექტების დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'თბილისი',
                'salary_min' => 2500,
                'salary_max' => 3500,
                'salary_range' => '2500-3500 GEL',
                'contact_email' => 'hr@culture.gov.ge',
                'contact_phone' => '+995 32 123 4567',
                'start_date' => Carbon::now()->addMonths(2),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ცენტრის მენეჯერი',
                    'en' => 'Sports Center Manager'
                ],
                'description' => [
                    'ka' => '<p>სპორტული ცენტრის მენეჯერის პოზიცია. მოვალეობები მოიცავს ცენტრის ყოველდღიურ მართვას, პერსონალის მართვას და სპორტული ღონისძიებების ორგანიზებას.</p><p>საჭიროა სპორტის მართვის განათლება და მინიმუმ 3 წლის გამოცდილება.</p>',
                    'en' => '<p>Sports Center Manager position. Responsibilities include daily management of the center, personnel management, and organization of sports events.</p><p>Sports management education and minimum 3 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'სპორტის მართვის განათლება, მინიმუმ 3 წლის გამოცდილება, ლიდერობის უნარები',
                    'en' => 'Sports management education, minimum 3 years of experience, leadership skills'
                ],
                'slug' => 'sports-center-manager',
                'application_deadline' => Carbon::now()->addMonths(2),
                'department' => 'სპორტის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'ბათუმი',
                'salary_min' => 2000,
                'salary_max' => 2800,
                'salary_range' => '2000-2800 GEL',
                'contact_email' => 'sports@culture.gov.ge',
                'contact_phone' => '+995 422 123 456',
                'start_date' => Carbon::now()->addMonths(3),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'მუზეუმის კურატორი',
                    'en' => 'Museum Curator'
                ],
                'description' => [
                    'ka' => '<p>ეროვნული მუზეუმის კურატორის პოზიცია. მოვალეობები მოიცავს გამოფენების ორგანიზებას, ექსპონატების კატალოგიზაციას და კვლევითი სამუშაოების ჩატარებას.</p><p>საჭიროა ისტორიის ან არქეოლოგიის განათლება და მინიმუმ 4 წლის გამოცდილება.</p>',
                    'en' => '<p>National Museum Curator position. Responsibilities include organizing exhibitions, cataloging exhibits, and conducting research work.</p><p>History or archaeology education and minimum 4 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'ისტორიის ან არქეოლოგიის განათლება, მინიმუმ 4 წლის გამოცდილება, კვლევითი უნარები',
                    'en' => 'History or archaeology education, minimum 4 years of experience, research skills'
                ],
                'slug' => 'museum-curator',
                'application_deadline' => Carbon::now()->addMonths(1),
                'department' => 'მუზეუმების დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'თბილისი',
                'salary_min' => 1800,
                'salary_max' => 2500,
                'salary_range' => '1800-2500 GEL',
                'contact_email' => 'museums@culture.gov.ge',
                'contact_phone' => '+995 32 234 5678',
                'start_date' => Carbon::now()->addMonths(2),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ტრენერი',
                    'en' => 'Sports Trainer'
                ],
                'description' => [
                    'ka' => '<p>სპორტული ტრენერის პოზიცია. მოვალეობები მოიცავს ახალგაზრდა სპორტსმენების მომზადებას, ტრენინგების ჩატარებას და სპორტული პროგრამების შემუშავებას.</p><p>საჭიროა სპორტის განათლება და მინიმუმ 2 წლის გამოცდილება.</p>',
                    'en' => '<p>Sports Trainer position. Responsibilities include training young athletes, conducting training sessions, and developing sports programs.</p><p>Sports education and minimum 2 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'სპორტის განათლება, მინიმუმ 2 წლის გამოცდილება, ტრენერის სერტიფიკატი',
                    'en' => 'Sports education, minimum 2 years of experience, trainer certificate'
                ],
                'slug' => 'sports-trainer',
                'application_deadline' => Carbon::now()->addMonths(1),
                'department' => 'სპორტის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'ქუთაისი',
                'salary_min' => 1200,
                'salary_max' => 1800,
                'salary_range' => '1200-1800 GEL',
                'contact_email' => 'training@culture.gov.ge',
                'contact_phone' => '+995 431 234 567',
                'start_date' => Carbon::now()->addMonths(2),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ღონისძიებების კოორდინატორი',
                    'en' => 'Cultural Events Coordinator'
                ],
                'description' => [
                    'ka' => '<p>კულტურული ღონისძიებების კოორდინატორის პოზიცია. მოვალეობები მოიცავს ფესტივალების, კონცერტების და გამოფენების ორგანიზებას.</p><p>საჭიროა კულტურის მართვის განათლება და მინიმუმ 3 წლის გამოცდილება.</p>',
                    'en' => '<p>Cultural Events Coordinator position. Responsibilities include organizing festivals, concerts, and exhibitions.</p><p>Cultural management education and minimum 3 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'კულტურის მართვის განათლება, მინიმუმ 3 წლის გამოცდილება, ორგანიზაციული უნარები',
                    'en' => 'Cultural management education, minimum 3 years of experience, organizational skills'
                ],
                'slug' => 'cultural-events-coordinator',
                'application_deadline' => Carbon::now()->addMonths(2),
                'department' => 'კულტურული ღონისძიებების დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'თბილისი',
                'salary_min' => 1600,
                'salary_max' => 2200,
                'salary_range' => '1600-2200 GEL',
                'contact_email' => 'events@culture.gov.ge',
                'contact_phone' => '+995 32 345 6789',
                'start_date' => Carbon::now()->addMonths(3),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული მედიცინის ექიმი',
                    'en' => 'Sports Medicine Doctor'
                ],
                'description' => [
                    'ka' => '<p>სპორტული მედიცინის ექიმის პოზიცია. მოვალეობები მოიცავს სპორტსმენების ჯანმრთელობის მონიტორინგს, დიაგნოსტიკას და რეაბილიტაციას.</p><p>საჭიროა სამედიცინო განათლება და სპორტული მედიცინის სპეციალიზაცია.</p>',
                    'en' => '<p>Sports Medicine Doctor position. Responsibilities include monitoring athletes\' health, diagnostics, and rehabilitation.</p><p>Medical education and sports medicine specialization required.</p>'
                ],
                'requirements' => [
                    'ka' => 'სამედიცინო განათლება, სპორტული მედიცინის სპეციალიზაცია, ლიცენზია',
                    'en' => 'Medical education, sports medicine specialization, license'
                ],
                'slug' => 'sports-medicine-doctor',
                'application_deadline' => Carbon::now()->addMonths(1),
                'department' => 'სპორტული მედიცინის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'თბილისი',
                'salary_min' => 3000,
                'salary_max' => 4500,
                'salary_range' => '3000-4500 GEL',
                'contact_email' => 'medicine@culture.gov.ge',
                'contact_phone' => '+995 32 456 7890',
                'start_date' => Carbon::now()->addMonths(2),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'ხელოვნების ისტორიკოსი',
                    'en' => 'Art Historian'
                ],
                'description' => [
                    'ka' => '<p>ხელოვნების ისტორიკოსის პოზიცია. მოვალეობები მოიცავს ქართული ხელოვნების ისტორიის კვლევას, გამოფენების მომზადებას და სამეცნიერო ნაშრომების წერას.</p><p>საჭიროა ხელოვნების ისტორიის განათლება და მინიმუმ 5 წლის გამოცდილება.</p>',
                    'en' => '<p>Art Historian position. Responsibilities include researching Georgian art history, preparing exhibitions, and writing scientific papers.</p><p>Art history education and minimum 5 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'ხელოვნების ისტორიის განათლება, მინიმუმ 5 წლის გამოცდილება, კვლევითი ნაშრომები',
                    'en' => 'Art history education, minimum 5 years of experience, research papers'
                ],
                'slug' => 'art-historian',
                'application_deadline' => Carbon::now()->addMonths(2),
                'department' => 'ხელოვნების ისტორიის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'თბილისი',
                'salary_min' => 2000,
                'salary_max' => 2800,
                'salary_range' => '2000-2800 GEL',
                'contact_email' => 'art@culture.gov.ge',
                'contact_phone' => '+995 32 567 8901',
                'start_date' => Carbon::now()->addMonths(3),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ფოტოგრაფი',
                    'en' => 'Sports Photographer'
                ],
                'description' => [
                    'ka' => '<p>სპორტული ფოტოგრაფის პოზიცია. მოვალეობები მოიცავს სპორტული ღონისძიებების ფოტოგრაფირებას, მასალების რედაქტირებას და არქივის მართვას.</p><p>საჭიროა ფოტოგრაფიის განათლება და მინიმუმ 2 წლის გამოცდილება.</p>',
                    'en' => '<p>Sports Photographer position. Responsibilities include photographing sports events, editing materials, and managing archives.</p><p>Photography education and minimum 2 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'ფოტოგრაფიის განათლება, მინიმუმ 2 წლის გამოცდილება, ფოტოგრაფიული ტექნიკა',
                    'en' => 'Photography education, minimum 2 years of experience, photographic equipment'
                ],
                'slug' => 'sports-photographer',
                'application_deadline' => Carbon::now()->addMonths(1),
                'department' => 'სპორტული მედიის დეპარტამენტი',
                'employment_type' => 'part_time',
                'location' => 'თბილისი',
                'salary_min' => 1000,
                'salary_max' => 1500,
                'salary_range' => '1000-1500 GEL',
                'contact_email' => 'media@culture.gov.ge',
                'contact_phone' => '+995 32 678 9012',
                'start_date' => Carbon::now()->addMonths(2),
                'duration' => 'კონტრაქტი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ტურიზმის სპეციალისტი',
                    'en' => 'Cultural Tourism Specialist'
                ],
                'description' => [
                    'ka' => '<p>კულტურული ტურიზმის სპეციალისტის პოზიცია. მოვალეობები მოიცავს ტურისტული მარშრუტების შემუშავებას, კულტურული ღონისძიებების ორგანიზებას და ტურისტების ინფორმირებას.</p><p>საჭიროა ტურიზმის განათლება და მინიმუმ 3 წლის გამოცდილება.</p>',
                    'en' => '<p>Cultural Tourism Specialist position. Responsibilities include developing tourist routes, organizing cultural events, and informing tourists.</p><p>Tourism education and minimum 3 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'ტურიზმის განათლება, მინიმუმ 3 წლის გამოცდილება, უცხო ენების ცოდნა',
                    'en' => 'Tourism education, minimum 3 years of experience, foreign language skills'
                ],
                'slug' => 'cultural-tourism-specialist',
                'application_deadline' => Carbon::now()->addMonths(2),
                'department' => 'ტურიზმის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'ბათუმი',
                'salary_min' => 1400,
                'salary_max' => 2000,
                'salary_range' => '1400-2000 GEL',
                'contact_email' => 'tourism@culture.gov.ge',
                'contact_phone' => '+995 422 234 567',
                'start_date' => Carbon::now()->addMonths(3),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ჟურნალისტი',
                    'en' => 'Sports Journalist'
                ],
                'description' => [
                    'ka' => '<p>სპორტული ჟურნალისტის პოზიცია. მოვალეობები მოიცავს სპორტული ღონისძიებების დაფარვას, სტატიების წერას და ინტერვიუების ჩატარებას.</p><p>საჭიროა ჟურნალისტიკის განათლება და მინიმუმ 2 წლის გამოცდილება.</p>',
                    'en' => '<p>Sports Journalist position. Responsibilities include covering sports events, writing articles, and conducting interviews.</p><p>Journalism education and minimum 2 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'ჟურნალისტიკის განათლება, მინიმუმ 2 წლის გამოცდილება, წერის უნარები',
                    'en' => 'Journalism education, minimum 2 years of experience, writing skills'
                ],
                'slug' => 'sports-journalist',
                'application_deadline' => Carbon::now()->addMonths(1),
                'department' => 'სპორტული მედიის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'თბილისი',
                'salary_min' => 1200,
                'salary_max' => 1800,
                'salary_range' => '1200-1800 GEL',
                'contact_email' => 'journalism@culture.gov.ge',
                'contact_phone' => '+995 32 789 0123',
                'start_date' => Carbon::now()->addMonths(2),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'მუსიკალური პროდიუსერი',
                    'en' => 'Music Producer'
                ],
                'description' => [
                    'ka' => '<p>მუსიკალური პროდიუსერის პოზიცია. მოვალეობები მოიცავს მუსიკალური პროექტების პროდიუსირებას, ჩაწერის სესიების მართვას და ხარისხის კონტროლს.</p><p>საჭიროა მუსიკალური განათლება და მინიმუმ 4 წლის გამოცდილება.</p>',
                    'en' => '<p>Music Producer position. Responsibilities include producing musical projects, managing recording sessions, and quality control.</p><p>Musical education and minimum 4 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'მუსიკალური განათლება, მინიმუმ 4 წლის გამოცდილება, ჩაწერის ტექნიკა',
                    'en' => 'Musical education, minimum 4 years of experience, recording equipment'
                ],
                'slug' => 'music-producer',
                'application_deadline' => Carbon::now()->addMonths(2),
                'department' => 'მუსიკალური პროდიუქციის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'თბილისი',
                'salary_min' => 2500,
                'salary_max' => 3500,
                'salary_range' => '2500-3500 GEL',
                'contact_email' => 'music@culture.gov.ge',
                'contact_phone' => '+995 32 890 1234',
                'start_date' => Carbon::now()->addMonths(3),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ფიზიოთერაპევტი',
                    'en' => 'Sports Physiotherapist'
                ],
                'description' => [
                    'ka' => '<p>სპორტული ფიზიოთერაპევტის პოზიცია. მოვალეობები მოიცავს სპორტსმენების რეაბილიტაციას, ფიზიოთერაპიული პროცედურების ჩატარებას და ჯანმრთელობის მონიტორინგს.</p><p>საჭიროა ფიზიოთერაპიის განათლება და მინიმუმ 3 წლის გამოცდილება.</p>',
                    'en' => '<p>Sports Physiotherapist position. Responsibilities include rehabilitation of athletes, conducting physiotherapy procedures, and health monitoring.</p><p>Physiotherapy education and minimum 3 years of experience required.</p>'
                ],
                'requirements' => [
                    'ka' => 'ფიზიოთერაპიის განათლება, მინიმუმ 3 წლის გამოცდილება, სპორტული მედიცინის ცოდნა',
                    'en' => 'Physiotherapy education, minimum 3 years of experience, sports medicine knowledge'
                ],
                'slug' => 'sports-physiotherapist',
                'application_deadline' => Carbon::now()->addMonths(1),
                'department' => 'სპორტული მედიცინის დეპარტამენტი',
                'employment_type' => 'full_time',
                'location' => 'ქუთაისი',
                'salary_min' => 1800,
                'salary_max' => 2500,
                'salary_range' => '1800-2500 GEL',
                'contact_email' => 'physio@culture.gov.ge',
                'contact_phone' => '+995 431 345 678',
                'start_date' => Carbon::now()->addMonths(2),
                'duration' => 'მუდმივი',
                'application_form' => null,
                'application_form_url' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
            ],
        ];

        foreach ($vacancies as $vacancy) {
            Vacancy::create($vacancy);
        }
    }
}
