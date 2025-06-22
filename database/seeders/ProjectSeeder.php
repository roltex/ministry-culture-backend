<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => [
                    'ka' => 'ეროვნული თეატრის რენოვაცია',
                    'en' => 'National Theater Renovation'
                ],
                'description' => [
                    'ka' => '<p>ეროვნული თეატრის მასშტაბური რენოვაცია, რომელიც მოიცავს სცენის მოწყობილობის განახლებას, აკუსტიკის გაუმჯობესებას და თანამედროვე ტექნოლოგიების დანერგვას.</p><p>პროექტი მოიცავს 2000 ადგილიანი დარბაზის რენოვაციას და ახალი სამხატვრო საამქროების მშენებლობას.</p>',
                    'en' => '<p>Large-scale renovation of the National Theater, including stage equipment renewal, acoustic improvement, and introduction of modern technologies.</p><p>The project includes renovation of a 2000-seat hall and construction of new artistic workshops.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ეროვნული თეატრის მასშტაბური რენოვაცია',
                    'en' => 'Large-scale renovation of National Theater'
                ],
                'slug' => 'national-theater-renovation',
                'featured_image' => 'project-images/national-theater.jpg',
                'budget' => 5000000,
                'location' => 'თბილისი, რუსთაველის გამზირი',
                'start_date' => Carbon::now()->addMonths(1),
                'end_date' => Carbon::now()->addMonths(18),
                'status' => 'planned',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => [
                    'ka' => 'ქართული კინოს ცენტრი',
                    'en' => 'Georgian Film Center'
                ],
                'description' => [
                    'ka' => '<p>ახალი ქართული კინოს ცენტრის მშენებლობა, რომელიც მოიცავს კინოსტუდიებს, პროექციის დარბაზებს და კინო ინდუსტრიის განვითარებისთვის საჭირო ინფრასტრუქტურას.</p><p>ცენტრი გახდება ქართული კინემატოგრაფიის განვითარების მთავარი ცენტრი.</p>',
                    'en' => '<p>Construction of a new Georgian Film Center, including film studios, projection halls, and infrastructure necessary for the development of the film industry.</p><p>The center will become the main center for the development of Georgian cinematography.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ახალი ქართული კინოს ცენტრის მშენებლობა',
                    'en' => 'Construction of new Georgian Film Center'
                ],
                'slug' => 'georgian-film-center',
                'featured_image' => 'project-images/film-center.jpg',
                'budget' => 8000000,
                'location' => 'თბილისი, ვაჟა-ფშაველას გამზირი',
                'start_date' => Carbon::now()->addMonths(2),
                'end_date' => Carbon::now()->addMonths(24),
                'status' => 'planned',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ცენტრი რეგიონებში',
                    'en' => 'Sports Centers in Regions'
                ],
                'description' => [
                    'ka' => '<p>10 რეგიონში სპორტული ცენტრების მშენებლობა, რომლებიც მოიცავს საფეხბურთო მოედნებს, საკალათბურთო დარბაზებს, საცურაო აუზებს და ფიტნეს ცენტრებს.</p><p>პროექტი მიზნად ისახავს სპორტის განვითარებას რეგიონებში.</p>',
                    'en' => '<p>Construction of sports centers in 10 regions, including football fields, basketball halls, swimming pools, and fitness centers.</p><p>The project aims to develop sports in the regions.</p>'
                ],
                'excerpt' => [
                    'ka' => '10 სპორტული ცენტრი რეგიონებში',
                    'en' => '10 sports centers in regions'
                ],
                'slug' => 'sports-centers-regions',
                'featured_image' => 'project-images/sports-center.jpg',
                'budget' => 12000000,
                'location' => 'საქართველოს რეგიონები',
                'start_date' => Carbon::now()->addMonths(3),
                'end_date' => Carbon::now()->addMonths(30),
                'status' => 'planned',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => [
                    'ka' => 'კულტურული მემკვიდრეობის ციფრული არქივი',
                    'en' => 'Digital Archive of Cultural Heritage'
                ],
                'description' => [
                    'ka' => '<p>ქართული კულტურული მემკვიდრეობის ციფრული არქივის შექმნა, რომელიც მოიცავს ისტორიული დოკუმენტების, ხელოვნების ნიმუშების და არქეოლოგიური ძეგლების 3D სკანირებას.</p><p>არქივი ხელმისაწვდომი იქნება მთელი მსოფლიოსთვის.</p>',
                    'en' => '<p>Creation of a digital archive of Georgian cultural heritage, including 3D scanning of historical documents, art samples, and archaeological monuments.</p><p>The archive will be accessible to the whole world.</p>'
                ],
                'excerpt' => [
                    'ka' => 'კულტურული მემკვიდრეობის ციფრული არქივი',
                    'en' => 'Digital archive of cultural heritage'
                ],
                'slug' => 'digital-archive-cultural-heritage',
                'featured_image' => 'project-images/digital-archive.jpg',
                'budget' => 3000000,
                'start_date' => Carbon::now()->addMonths(1),
                'end_date' => Carbon::now()->addMonths(12),
                'status' => 'planned',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მხატვართა სტუდიები',
                    'en' => 'Young Artists Studios'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა მხატვრებისთვის სტუდიების მშენებლობა თბილისის სხვადასხვა უბანში. სტუდიები მოიცავს სახატავ დარბაზებს, სკულპტურის საამქროებს და გამოფენის სივრცეებს.</p><p>პროექტი მიზნად ისახავს ახალგაზრდა ხელოვანების მხარდაჭერას.</p>',
                    'en' => '<p>Construction of studios for young artists in various districts of Tbilisi. Studios include painting halls, sculpture workshops, and exhibition spaces.</p><p>The project aims to support young artists.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ახალგაზრდა მხატვართა სტუდიები თბილისში',
                    'en' => 'Young artists studios in Tbilisi'
                ],
                'slug' => 'young-artists-studios',
                'featured_image' => 'project-images/art-studios.jpg',
                'budget' => 2500000,
                'start_date' => Carbon::now()->addMonths(2),
                'end_date' => Carbon::now()->addMonths(15),
                'status' => 'planned',
                'is_published' => true,
            ],
            [
                'title' => [
                    'ka' => 'მუსიკალური აკადემიის გაფართოება',
                    'en' => 'Music Academy Expansion'
                ],
                'description' => [
                    'ka' => '<p>თბილისის სახელმწიფო კონსერვატორიის გაფართოება, რომელიც მოიცავს ახალი კლასების მშენებლობას, კონცერტის დარბაზის რენოვაციას და თანამედროვე მუსიკალური ტექნოლოგიების დანერგვას.</p><p>გაფართოება საშუალებას მისცემს მეტი სტუდენტის მიღებას.</p>',
                    'en' => '<p>Expansion of Tbilisi State Conservatory, including construction of new classrooms, renovation of concert hall, and introduction of modern musical technologies.</p><p>The expansion will allow admission of more students.</p>'
                ],
                'excerpt' => [
                    'ka' => 'თბილისის კონსერვატორიის გაფართოება',
                    'en' => 'Tbilisi Conservatory expansion'
                ],
                'slug' => 'music-academy-expansion',
                'featured_image' => 'project-images/music-academy.jpg',
                'budget' => 4000000,
                'start_date' => Carbon::now()->addMonths(4),
                'end_date' => Carbon::now()->addMonths(20),
                'status' => 'planned',
                'is_published' => true,
            ],
            [
                'title' => [
                    'ka' => 'ქართული ხალხური ხელოვნების ცენტრი',
                    'en' => 'Georgian Folk Art Center'
                ],
                'description' => [
                    'ka' => '<p>ქართული ხალხური ხელოვნების ცენტრის მშენებლობა, რომელიც მოიცავს ტრადიციული ხელოვნების საამქროებს, გამოფენის დარბაზებს და ტურისტებისთვის ინტერაქტიულ გამოცდილებებს.</p><p>ცენტრი გახდება ქართული ხალხური ხელოვნების პრომოციის მთავარი ცენტრი.</p>',
                    'en' => '<p>Construction of a Georgian Folk Art Center, including traditional art workshops, exhibition halls, and interactive experiences for tourists.</p><p>The center will become the main center for promoting Georgian folk art.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ქართული ხალხური ხელოვნების ცენტრი',
                    'en' => 'Georgian Folk Art Center'
                ],
                'slug' => 'georgian-folk-art-center',
                'featured_image' => 'project-images/folk-art-center.jpg',
                'budget' => 3500000,
                'start_date' => Carbon::now()->addMonths(3),
                'end_date' => Carbon::now()->addMonths(18),
                'status' => 'planned',
                'is_published' => true,
            ],
            [
                'title' => [
                    'ka' => 'სპორტული მედიცინის ცენტრი',
                    'en' => 'Sports Medicine Center'
                ],
                'description' => [
                    'ka' => '<p>სპორტული მედიცინის ცენტრის მშენებლობა, რომელიც მოიცავს დიაგნოსტიკის ლაბორატორიებს, რეაბილიტაციის დარბაზებს და სპორტსმენებისთვის სპეციალიზებულ მედიცინურ მომსახურებას.</p><p>ცენტრი გახდება საქართველოს სპორტული მედიცინის მთავარი ცენტრი.</p>',
                    'en' => '<p>Construction of a Sports Medicine Center, including diagnostic laboratories, rehabilitation halls, and specialized medical services for athletes.</p><p>The center will become the main center of sports medicine in Georgia.</p>'
                ],
                'excerpt' => [
                    'ka' => 'სპორტული მედიცინის ცენტრი',
                    'en' => 'Sports Medicine Center'
                ],
                'slug' => 'sports-medicine-center',
                'featured_image' => 'project-images/sports-medicine.jpg',
                'budget' => 6000000,
                'start_date' => Carbon::now()->addMonths(5),
                'end_date' => Carbon::now()->addMonths(22),
                'status' => 'planned',
                'is_published' => true,
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მწერლების პროგრამა',
                    'en' => 'Young Writers Program'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა მწერლების მხარდაჭერის პროგრამა, რომელიც მოიცავს ლიტერატურული სემინარების ორგანიზებას, წიგნების გამოცემის მხარდაჭერას და საერთაშორისო ლიტერატურული ფესტივალებში მონაწილეობის შესაძლებლობას.</p><p>პროგრამაში მონაწილეობას მიიღებს 30 ახალგაზრდა მწერალი.</p>',
                    'en' => '<p>A program to support young writers, including organization of literary seminars, support for book publishing, and opportunities to participate in international literary festivals.</p><p>30 young writers will participate in the program.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ახალგაზრდა მწერლების მხარდაჭერის პროგრამა',
                    'en' => 'Young writers support program'
                ],
                'slug' => 'young-writers-program',
                'featured_image' => 'project-images/writers-program.jpg',
                'budget' => 1500000,
                'start_date' => Carbon::now()->addMonths(1),
                'end_date' => Carbon::now()->addMonths(12),
                'status' => 'planned',
                'is_published' => true,
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ტურიზმის განვითარება',
                    'en' => 'Cultural Tourism Development'
                ],
                'description' => [
                    'ka' => '<p>კულტურული ტურიზმის განვითარების პროექტი, რომელიც მოიცავს ისტორიული ძეგლების რესტავრაციას, ტურისტული მარშრუტების შექმნას და ლოკალური მოსახლეობისთვის სამუშაო შესაძლებლობების შექმნას.</p><p>პროექტი მოიცავს 15 რეგიონს.</p>',
                    'en' => '<p>A cultural tourism development project, including restoration of historical monuments, creation of tourist routes, and creation of employment opportunities for local population.</p><p>The project includes 15 regions.</p>'
                ],
                'excerpt' => [
                    'ka' => 'კულტურული ტურიზმის განვითარება 15 რეგიონში',
                    'en' => 'Cultural tourism development in 15 regions'
                ],
                'slug' => 'cultural-tourism-development',
                'featured_image' => 'project-images/cultural-tourism.jpg',
                'budget' => 10000000,
                'start_date' => Carbon::now()->addMonths(2),
                'end_date' => Carbon::now()->addMonths(36),
                'status' => 'planned',
                'is_published' => true,
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ტალანტების აღმოჩენა',
                    'en' => 'Sports Talent Discovery'
                ],
                'description' => [
                    'ka' => '<p>ახალგაზრდა სპორტული ტალანტების აღმოჩენის პროგრამა, რომელიც მოიცავს სპორტული ტესტირების ორგანიზებას, ტრენინგების ჩატარებას და საერთაშორისო ტურნირებში მონაწილეობის მხარდაჭერას.</p><p>პროგრამა მოიცავს 1000 ახალგაზრდა სპორტსმენს.</p>',
                    'en' => '<p>A program to discover young sports talents, including organization of sports testing, conducting training, and supporting participation in international tournaments.</p><p>The program includes 1000 young athletes.</p>'
                ],
                'excerpt' => [
                    'ka' => '1000 ახალგაზრდა სპორტსმენის ტალანტების აღმოჩენა',
                    'en' => 'Discovery of 1000 young athletes\' talents'
                ],
                'slug' => 'sports-talent-discovery',
                'featured_image' => 'project-images/sports-talent.jpg',
                'budget' => 2000000,
                'start_date' => Carbon::now()->addMonths(1),
                'end_date' => Carbon::now()->addMonths(18),
                'status' => 'planned',
                'is_published' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
