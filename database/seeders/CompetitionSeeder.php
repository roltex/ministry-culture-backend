<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;
use Carbon\Carbon;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Available competition images
        $competitionImages = [
            '01JYCSK84QN3R8YGH7DJCWCS0A.jpg',
            '01JYCSG95VZQDAVFYERS6TY8NA.jpg',
            '01JYCS7ZTPZBXNARASBKWYADGP.jpg',
            '01JYCRXV2XM3T8V2D0NFSCJRK8.jpg',
            '01JYCRT13WRNSRJ2R9AS4APVDW.jpg',
            '01JYCRKC98HT46N5XZG1YDMDE3.png',
            '01JYC8BMEE8FNJDCMHGASPJQMQ.jpg',
            '01JYC6AGEMSKZGZRJ0NAYR1NRE.jpeg',
            '01JYC2YHKP4RHH2QPJKV905GK7.jpg',
            '01JY7J3H8PAW7TV8E6RDZD22SM.jpeg',
            '01JY7GRR7AWCDJ3EH8BC31PBMS.jpeg',
            '01JY7FZ4EGT7359T4W51EWZT6Z.jpeg',
            '01JY7FSTMKHCEQ6PFQFFD3WQ5B.jpeg',
            '01JY7FK3KJGMNCJZY29RJCGZ4H.jpeg',
            '01JY7FEBTZCGBKFSQ40G4J9XDB.jpeg',
            '01JY7F23PWBQVGDN4JBZ69NFDF.jpeg',
        ];

        $competitions = [
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მხატვართა საერთაშორისო კონკურსი',
                    'en' => 'International Young Artists Competition'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა მხატვართა საერთაშორისო კონკურსი, რომელიც მიზნად ისახავს ახალგაზრდა ხელოვანების მხარდაჭერას და მათი შემოქმედების საერთაშორისო აღიარებას.</p><p>კონკურსში მონაწილეობას მიიღებს 200 მხატვარი 30 ქვეყნიდან.</p>',
                    'en' => '<p>International competition for young artists, aimed at supporting young artists and international recognition of their creativity.</p><p>200 artists from 30 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>ახალგაზრდა მხატვართა საერთაშორისო კონკურსი, რომელიც მიზნად ისახავს ახალგაზრდა ხელოვანების მხარდაჭერას და მათი შემოქმედების საერთაშორისო აღიარებას.</p><p>კონკურსში მონაწილეობას მიიღებს 200 მხატვარი 30 ქვეყნიდან.</p><p>კონკურსის პროცესი მოიცავს რამდენიმე ეტაპს:</p><ul><li>პირველი ეტაპი - ნაწარმოებების წარდგენა</li><li>მეორე ეტაპი - ჟიურის შეფასება</li><li>მესამე ეტაპი - გამოფენა და ფინალური შეფასება</li></ul>',
                    'en' => '<p>International competition for young artists, aimed at supporting young artists and international recognition of their creativity.</p><p>200 artists from 30 countries will participate in the competition.</p><p>The competition process includes several stages:</p><ul><li>First stage - submission of works</li><li>Second stage - jury evaluation</li><li>Third stage - exhibition and final evaluation</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '200 მხატვარი 30 ქვეყნიდან',
                    'en' => '200 artists from 30 countries'
                ],
                'slug' => 'international-young-artists-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'art',
                'prize_amount' => 25000,
                'max_participants' => 200,
                'contact_email' => 'artists@culture.gov.ge',
                'contact_phone' => '+9955111111',
                'application_deadline' => Carbon::now()->addMonths(2),
                'competition_start' => Carbon::now()->addMonths(2)->addDays(2),
                'competition_end' => Carbon::now()->addMonths(2)->addDays(7),
                'results_announcement' => Carbon::now()->addMonths(2)->addDays(10),
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
                'requirements' => [
                    'ka' => 'მონაწილეობის პირობები ქართულად',
                    'en' => 'Participation requirements in English'
                ],
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'ქართული ხალხური ცეკვების ფესტივალი',
                    'en' => 'Georgian Folk Dance Festival'
                ],
                'description' => [
                    'ka' => '<p>ქართული ხალხური ცეკვების საერთაშორისო ფესტივალი, რომელიც მიზნად ისახავს ქართული ცეკვების პოპულარიზაციას და საერთაშორისო გაცვლის ხელშეწყობას.</p><p>ფესტივალში მონაწილეობას მიიღებს 50 ანსამბლი 20 ქვეყნიდან.</p>',
                    'en' => '<p>International festival of Georgian folk dances, aimed at popularizing Georgian dances and promoting international exchange.</p><p>50 ensembles from 20 countries will participate in the festival.</p>'
                ],
                'content' => [
                    'ka' => '<p>ქართული ხალხური ცეკვების საერთაშორისო ფესტივალი, რომელიც მიზნად ისახავს ქართული ცეკვების პოპულარიზაციას და საერთაშორისო გაცვლის ხელშეწყობას.</p><p>ფესტივალში მონაწილეობას მიიღებს 50 ანსამბლი 20 ქვეყნიდან.</p><p>ფესტივალის პროგრამა მოიცავს:</p><ul><li>ცეკვების შოუს</li><li>მასტერკლასებს</li><li>საერთაშორისო კონფერენციას</li><li>კულტურულ ღონისძიებებს</li></ul>',
                    'en' => '<p>International festival of Georgian folk dances, aimed at popularizing Georgian dances and promoting international exchange.</p><p>50 ensembles from 20 countries will participate in the festival.</p><p>The festival program includes:</p><ul><li>Dance shows</li><li>Master classes</li><li>International conference</li><li>Cultural events</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '50 ანსამბლი 20 ქვეყნიდან',
                    'en' => '50 ensembles from 20 countries'
                ],
                'slug' => 'georgian-folk-dance-festival',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'dance',
                'prize_amount' => 15000,
                'max_participants' => 120,
                'contact_email' => 'info@culture.gov.ge',
                'contact_phone' => '+9955000000',
                'application_deadline' => Carbon::now()->addMonths(1),
                'competition_start' => Carbon::now()->addMonths(1)->addDays(2),
                'competition_end' => Carbon::now()->addMonths(1)->addDays(7),
                'results_announcement' => Carbon::now()->addMonths(1)->addDays(10),
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => Carbon::now(),
                'requirements' => [
                    'ka' => 'მონაწილეობის პირობები ქართულად',
                    'en' => 'Participation requirements in English'
                ],
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მუსიკოსთა კონკურსი',
                    'en' => 'Young Musicians Competition'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა მუსიკოსთა საერთაშორისო კონკურსი, რომელიც მოიცავს კლასიკური მუსიკის, ჯაზის და ხალხური მუსიკის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 150 მუსიკოსი 25 ქვეყნიდან.</p>',
                    'en' => '<p>International competition for young musicians, including categories of classical music, jazz, and folk music.</p><p>150 musicians from 25 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>ახალგაზრდა მუსიკოსთა საერთაშორისო კონკურსი, რომელიც მოიცავს კლასიკური მუსიკის, ჯაზის და ხალხური მუსიკის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 150 მუსიკოსი 25 ქვეყნიდან.</p><p>კონკურსის კატეგორიები:</p><ul><li>კლასიკური მუსიკა</li><li>ჯაზი</li><li>ხალხური მუსიკა</li><li>თანამედროვე მუსიკა</li></ul>',
                    'en' => '<p>International competition for young musicians, including categories of classical music, jazz, and folk music.</p><p>150 musicians from 25 countries will participate in the competition.</p><p>Competition categories:</p><ul><li>Classical music</li><li>Jazz</li><li>Folk music</li><li>Contemporary music</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '150 მუსიკოსი 25 ქვეყნიდან',
                    'en' => '150 musicians from 25 countries'
                ],
                'slug' => 'young-musicians-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'music',
                'prize_amount' => 30000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(3),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'ქართული კინოს ფესტივალი',
                    'en' => 'Georgian Film Festival'
                ],
                'description' => [
                    'ka' => '<p>ქართული კინოს საერთაშორისო ფესტივალი, რომელიც მიზნად ისახავს ქართული კინემატოგრაფიის პრომოციას და საერთაშორისო კოპროდუქციის ხელშეწყობას.</p><p>ფესტივალში მონაწილეობას მიიღებს 100 ფილმი 40 ქვეყნიდან.</p>',
                    'en' => '<p>International festival of Georgian cinema, aimed at promoting Georgian cinematography and supporting international co-production.</p><p>100 films from 40 countries will participate in the festival.</p>'
                ],
                'content' => [
                    'ka' => '<p>ქართული კინოს საერთაშორისო ფესტივალი, რომელიც მიზნად ისახავს ქართული კინემატოგრაფიის პრომოციას და საერთაშორისო კოპროდუქციის ხელშეწყობას.</p><p>ფესტივალში მონაწილეობას მიიღებს 100 ფილმი 40 ქვეყნიდან.</p><p>ფესტივალის პროგრამა:</p><ul><li>ფილმების ჩვენება</li><li>რეჟისორთა შეხვედრები</li><li>საერთაშორისო კონფერენცია</li><li>ჯილდოების ცერემონია</li></ul>',
                    'en' => '<p>International festival of Georgian cinema, aimed at promoting Georgian cinematography and supporting international co-production.</p><p>100 films from 40 countries will participate in the festival.</p><p>Festival program:</p><ul><li>Film screenings</li><li>Director meetings</li><li>International conference</li><li>Awards ceremony</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '100 ფილმი 40 ქვეყნიდან',
                    'en' => '100 films from 40 countries'
                ],
                'slug' => 'georgian-film-festival',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'film',
                'prize_amount' => 50000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(2),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მწერლების კონკურსი',
                    'en' => 'Young Writers Competition'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა მწერლების საერთაშორისო კონკურსი, რომელიც მოიცავს პროზის, პოეზიის და დრამატურგიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 300 მწერალი 35 ქვეყნიდან.</p>',
                    'en' => '<p>International competition for young writers, including categories of prose, poetry, and dramaturgy.</p><p>300 writers from 35 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>ახალგაზრდა მწერლების საერთაშორისო კონკურსი, რომელიც მოიცავს პროზის, პოეზიის და დრამატურგიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 300 მწერალი 35 ქვეყნიდან.</p><p>ლიტერატურული კატეგორიები:</p><ul><li>პროზა</li><li>პოეზია</li><li>დრამატურგია</li><li>ესე</li></ul>',
                    'en' => '<p>International competition for young writers, including categories of prose, poetry, and dramaturgy.</p><p>300 writers from 35 countries will participate in the competition.</p><p>Literary categories:</p><ul><li>Prose</li><li>Poetry</li><li>Dramaturgy</li><li>Essay</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '300 მწერალი 35 ქვეყნიდან',
                    'en' => '300 writers from 35 countries'
                ],
                'slug' => 'young-writers-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'literature',
                'prize_amount' => 20000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(1),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ტალანტების კონკურსი',
                    'en' => 'Sports Talent Competition'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა სპორტსმენთა საერთაშორისო კონკურსი, რომელიც მოიცავს ფეხბურთს, კალათბურთს, ცურვას და ფეხბურთს.</p><p>კონკურსში მონაწილეობას მიიღებს 500 სპორტსმენი 30 ქვეყნიდან.</p>',
                    'en' => '<p>International competition for young athletes, including football, basketball, swimming, and athletics.</p><p>500 athletes from 30 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>ახალგაზრდა სპორტსმენთა საერთაშორისო კონკურსი, რომელიც მოიცავს ფეხბურთს, კალათბურთს, ცურვას და ფეხბურთს.</p><p>კონკურსში მონაწილეობას მიიღებს 500 სპორტსმენი 30 ქვეყნიდან.</p><p>სპორტული დისციპლინები:</p><ul><li>ფეხბურთი</li><li>კალათბურთი</li><li>ცურვა</li><li>ფეხბურთი</li></ul>',
                    'en' => '<p>International competition for young athletes, including football, basketball, swimming, and athletics.</p><p>500 athletes from 30 countries will participate in the competition.</p><p>Sports disciplines:</p><ul><li>Football</li><li>Basketball</li><li>Swimming</li><li>Athletics</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '500 სპორტსმენი 30 ქვეყნიდან',
                    'en' => '500 athletes from 30 countries'
                ],
                'slug' => 'sports-talent-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'sports',
                'prize_amount' => 40000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(2),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'ფოტოგრაფიის კონკურსი',
                    'en' => 'Photography Competition'
                ],
                'description' => [
                    'ka' => '<p>ფოტოგრაფიის საერთაშორისო კონკურსი, რომელიც მოიცავს ნატურის, პორტრეტის და დოკუმენტური ფოტოგრაფიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 1000 ფოტოგრაფი 50 ქვეყნიდან.</p>',
                    'en' => '<p>International photography competition, including categories of nature, portrait, and documentary photography.</p><p>1000 photographers from 50 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>ფოტოგრაფიის საერთაშორისო კონკურსი, რომელიც მოიცავს ნატურის, პორტრეტის და დოკუმენტური ფოტოგრაფიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 1000 ფოტოგრაფი 50 ქვეყნიდან.</p><p>ფოტოგრაფიის კატეგორიები:</p><ul><li>ნატურის ფოტოგრაფია</li><li>პორტრეტი</li><li>დოკუმენტური ფოტოგრაფია</li><li>ქუჩის ფოტოგრაფია</li></ul>',
                    'en' => '<p>International photography competition, including categories of nature, portrait, and documentary photography.</p><p>1000 photographers from 50 countries will participate in the competition.</p><p>Photography categories:</p><ul><li>Nature photography</li><li>Portrait</li><li>Documentary photography</li><li>Street photography</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '1000 ფოტოგრაფი 50 ქვეყნიდან',
                    'en' => '1000 photographers from 50 countries'
                ],
                'slug' => 'photography-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'photography',
                'prize_amount' => 15000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(1),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'დიზაინის კონკურსი',
                    'en' => 'Design Competition'
                ],
                'description' => [
                    'ka' => '<p>დიზაინის საერთაშორისო კონკურსი, რომელიც მოიცავს ინდუსტრიული დიზაინის, გრაფიკული დიზაინის და ფეშენ დიზაინის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 400 დიზაინერი 25 ქვეყნიდან.</p>',
                    'en' => '<p>International design competition, including categories of industrial design, graphic design, and fashion design.</p><p>400 designers from 25 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>დიზაინის საერთაშორისო კონკურსი, რომელიც მოიცავს ინდუსტრიული დიზაინის, გრაფიკული დიზაინის და ფეშენ დიზაინის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 400 დიზაინერი 25 ქვეყნიდან.</p><p>დიზაინის სფეროები:</p><ul><li>ინდუსტრიული დიზაინი</li><li>გრაფიკული დიზაინი</li><li>ფეშენ დიზაინი</li><li>ვებ დიზაინი</li></ul>',
                    'en' => '<p>International design competition, including categories of industrial design, graphic design, and fashion design.</p><p>400 designers from 25 countries will participate in the competition.</p><p>Design areas:</p><ul><li>Industrial design</li><li>Graphic design</li><li>Fashion design</li><li>Web design</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '400 დიზაინერი 25 ქვეყნიდან',
                    'en' => '400 designers from 25 countries'
                ],
                'slug' => 'design-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'design',
                'prize_amount' => 25000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(3),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'არქიტექტურის კონკურსი',
                    'en' => 'Architecture Competition'
                ],
                'description' => [
                    'ka' => '<p>არქიტექტურის საერთაშორისო კონკურსი, რომელიც მიზნად ისახავს მდგრადი და ინოვაციური არქიტექტურული გადაწყვეტების პრომოციას.</p><p>კონკურსში მონაწილეობას მიიღებს 200 არქიტექტორი 30 ქვეყნიდან.</p>',
                    'en' => '<p>International architecture competition, aimed at promoting sustainable and innovative architectural solutions.</p><p>200 architects from 30 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>არქიტექტურის საერთაშორისო კონკურსი, რომელიც მიზნად ისახავს მდგრადი და ინოვაციური არქიტექტურული გადაწყვეტების პრომოციას.</p><p>კონკურსში მონაწილეობას მიიღებს 200 არქიტექტორი 30 ქვეყნიდან.</p><p>არქიტექტურული თემები:</p><ul><li>მდგრადი განვითარება</li><li>ინოვაციური მასალები</li><li>ურბანული დაგეგმვა</li><li>კულტურული მემკვიდრეობა</li></ul>',
                    'en' => '<p>International architecture competition, aimed at promoting sustainable and innovative architectural solutions.</p><p>200 architects from 30 countries will participate in the competition.</p><p>Architectural themes:</p><ul><li>Sustainable development</li><li>Innovative materials</li><li>Urban planning</li><li>Cultural heritage</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '200 არქიტექტორი 30 ქვეყნიდან',
                    'en' => '200 architects from 30 countries'
                ],
                'slug' => 'architecture-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'architecture',
                'prize_amount' => 35000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(2),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'კულინარიის კონკურსი',
                    'en' => 'Culinary Competition'
                ],
                'description' => [
                    'ka' => '<p>კულინარიის საერთაშორისო კონკურსი, რომელიც მოიცავს ქართული სამზარეულოს და საერთაშორისო კულინარიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 150 შეფ-მზარეული 20 ქვეყნიდან.</p>',
                    'en' => '<p>International culinary competition, including categories of Georgian cuisine and international cuisine.</p><p>150 chefs from 20 countries will participate in the competition.</p>'
                ],
                'content' => [
                    'ka' => '<p>კულინარიის საერთაშორისო კონკურსი, რომელიც მოიცავს ქართული სამზარეულოს და საერთაშორისო კულინარიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 150 შეფ-მზარეული 20 ქვეყნიდან.</p><p>კულინარიული კატეგორიები:</p><ul><li>ქართული სამზარეულო</li><li>საერთაშორისო კულინარია</li><li>დესერტები</li><li>ღვინო და სპირტიანი სასმელები</li></ul>',
                    'en' => '<p>International culinary competition, including categories of Georgian cuisine and international cuisine.</p><p>150 chefs from 20 countries will participate in the competition.</p><p>Culinary categories:</p><ul><li>Georgian cuisine</li><li>International cuisine</li><li>Desserts</li><li>Wine and spirits</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '150 შეფ-მზარეული 20 ქვეყნიდან',
                    'en' => '150 chefs from 20 countries'
                ],
                'slug' => 'culinary-competition',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'culinary',
                'prize_amount' => 20000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(1),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
            [
                'title' => [
                    'ka' => 'ცირკის ხელოვნების ფესტივალი',
                    'en' => 'Circus Arts Festival'
                ],
                'description' => [
                    'ka' => '<p>ცირკის ხელოვნების საერთაშორისო ფესტივალი, რომელიც მოიცავს აკრობატიკას, ჯონგლიორობას და კლოუნადას.</p><p>ფესტივალში მონაწილეობას მიიღებს 100 მსახიობი 15 ქვეყნიდან.</p>',
                    'en' => '<p>International festival of circus arts, including acrobatics, juggling, and clowning.</p><p>100 performers from 15 countries will participate in the festival.</p>'
                ],
                'content' => [
                    'ka' => '<p>ცირკის ხელოვნების საერთაშორისო ფესტივალი, რომელიც მოიცავს აკრობატიკას, ჯონგლიორობას და კლოუნადას.</p><p>ფესტივალში მონაწილეობას მიიღებს 100 მსახიობი 15 ქვეყნიდან.</p><p>ცირკის ხელოვნების ფორმები:</p><ul><li>აკრობატიკა</li><li>ჯონგლიორობა</li><li>კლოუნადა</li><li>ჰაერში ფრენა</li></ul>',
                    'en' => '<p>International festival of circus arts, including acrobatics, juggling, and clowning.</p><p>100 performers from 15 countries will participate in the festival.</p><p>Circus art forms:</p><ul><li>Acrobatics</li><li>Juggling</li><li>Clowning</li><li>Aerial arts</li></ul>'
                ],
                'excerpt' => [
                    'ka' => '100 მსახიობი 15 ქვეყნიდან',
                    'en' => '100 performers from 15 countries'
                ],
                'slug' => 'circus-arts-festival',
                'featured_image' => 'competition-images/' . $competitionImages[array_rand($competitionImages)],
                'category' => 'circus',
                'prize_amount' => 18000,
                'max_participants' => null,
                'contact_email' => null,
                'contact_phone' => null,
                'application_deadline' => Carbon::now()->addMonths(2),
                'competition_start' => null,
                'competition_end' => null,
                'results_announcement' => null,
                'application_form' => null,
                'is_active' => true,
                'is_published' => true,
                'published_at' => null,
                'requirements' => null,
                'status' => 'open',
            ],
        ];

        foreach ($competitions as $competition) {
            Competition::create($competition);
        }
    }
}
