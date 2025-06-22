<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubordinateInstitution;
use Carbon\Carbon;

class SubordinateInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutions = [
            [
                'name' => [
                    'ka' => 'საქართველოს ეროვნული მუზეუმი',
                    'en' => 'Georgian National Museum'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს ეროვნული მუზეუმი არის საქართველოს მთავარი მუზეუმი, რომელიც მოიცავს ისტორიული, არქეოლოგიური და ეთნოგრაფიული კოლექციებს.</p><p>მუზეუმი მდებარეობს თბილისის ცენტრში და მოიცავს რამდენიმე ფილიალს.</p>',
                    'en' => '<p>The Georgian National Museum is Georgia\'s main museum, which includes historical, archaeological, and ethnographic collections.</p><p>The museum is located in the center of Tbilisi and includes several branches.</p>'
                ],
                'mission' => [
                    'ka' => 'საქართველოს კულტურული მემკვიდრეობის შენახვა და პოპულარიზაცია',
                    'en' => 'Preserving and popularizing Georgia\'s cultural heritage'
                ],
                'vision' => [
                    'ka' => 'საქართველოს კულტურული მემკვიდრეობის მსოფლიო დონეზე წარდგენა',
                    'en' => 'Presenting Georgia\'s cultural heritage at world level'
                ],
                'slug' => 'georgian-national-museum',
                'type' => 'museum',
                'status' => 'active',
                'director_name' => 'დავით ლორთქიფანიძე',
                'establishment_year' => '2004',
                'logo' => null,
                'website_url' => 'https://museum.ge',
                'email' => 'info@museum.ge',
                'phone' => '+995 32 299 80 22',
                'address' => 'თბილისი, რუსთაველის გამზ. 3',
                'facebook' => 'https://facebook.com/georgianmuseum',
                'instagram' => 'https://instagram.com/georgianmuseum',
                'twitter' => 'https://twitter.com/georgianmuseum',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subYears(2),
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'თბილისის სახელმწიფო კონსერვატორია',
                    'en' => 'Tbilisi State Conservatory'
                ],
                'description' => [
                    'ka' => '<p>თბილისის სახელმწიფო კონსერვატორია არის საქართველოს მთავარი მუსიკალური საგანმანათლებლო დაწესებულება, რომელიც მზადყოფნაში აყენებს პროფესიონალ მუსიკოსებს.</p><p>კონსერვატორია დაარსდა 1917 წელს და მოიცავს კლასიკური, ჯაზის და ხალხური მუსიკის დეპარტამენტებს.</p>',
                    'en' => '<p>Tbilisi State Conservatory is Georgia\'s main musical educational institution, which prepares professional musicians.</p><p>The conservatory was founded in 1917 and includes departments of classical, jazz, and folk music.</p>'
                ],
                'mission' => [
                    'ka' => 'პროფესიონალ მუსიკოსების მზადყოფნა',
                    'en' => 'Preparing professional musicians'
                ],
                'vision' => [
                    'ka' => 'მუსიკალური განათლების საერთაშორისო სტანდარტებამდე მიყვანა',
                    'en' => 'Bringing musical education to international standards'
                ],
                'slug' => 'tbilisi-state-conservatory',
                'type' => 'educational',
                'status' => 'active',
                'director_name' => 'ნანა ხაჩატურიანი',
                'establishment_year' => '1917',
                'logo' => null,
                'website_url' => 'https://conservatoire.ge',
                'email' => 'info@conservatoire.ge',
                'phone' => '+995 32 298 65 55',
                'address' => 'თბილისი, გრიბოედოვის ქ. 8',
                'facebook' => 'https://facebook.com/tbilisiconservatory',
                'instagram' => 'https://instagram.com/tbilisiconservatory',
                'twitter' => null,
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subYears(1),
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს ეროვნული თეატრი',
                    'en' => 'Georgian National Theater'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს ეროვნული თეატრი არის საქართველოს მთავარი თეატრალური დაწესებულება, რომელიც წარმოადგენს ქართული თეატრის ხელოვნების საუკეთესო ნიმუშებს.</p><p>თეატრი დაარსდა 1851 წელს და მოიცავს დრამატულ და მუსიკალურ დეპარტამენტებს.</p>',
                    'en' => '<p>The Georgian National Theater is Georgia\'s main theatrical institution, which represents the best examples of Georgian theatrical art.</p><p>The theater was founded in 1851 and includes dramatic and musical departments.</p>'
                ],
                'mission' => [
                    'ka' => 'ქართული თეატრის ხელოვნების განვითარება',
                    'en' => 'Development of Georgian theatrical art'
                ],
                'vision' => [
                    'ka' => 'თეატრალური ხელოვნების საერთაშორისო არენაზე წარდგენა',
                    'en' => 'Presenting theatrical art on international arena'
                ],
                'slug' => 'georgian-national-theater',
                'type' => 'theater',
                'status' => 'active',
                'director_name' => 'რობერტ სტურუა',
                'establishment_year' => '1851',
                'logo' => null,
                'website_url' => 'https://theater.ge',
                'email' => 'info@theater.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, რუსთაველის გამზ. 17',
                'facebook' => 'https://facebook.com/georgiantheater',
                'instagram' => 'https://instagram.com/georgiantheater',
                'twitter' => 'https://twitter.com/georgiantheater',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => Carbon::now()->subMonths(18),
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს სპორტის სამინისტრო',
                    'en' => 'Georgian Ministry of Sports'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს სპორტის სამინისტრო არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია სპორტის განვითარებაზე, სპორტსმენების მხარდაჭერაზე და სპორტული ინფრასტრუქტურის განვითარებაზე.</p><p>სამინისტრო მართავს სპორტული ცენტრებს და ორგანიზებს საერთაშორისო ტურნირებს.</p>',
                    'en' => '<p>The Georgian Ministry of Sports is a state body responsible for sports development, athlete support, and sports infrastructure development.</p><p>The ministry manages sports centers and organizes international tournaments.</p>'
                ],
                'mission' => [
                    'ka' => 'სპორტის განვითარება და სპორტსმენების მხარდაჭერა',
                    'en' => 'Sports development and athlete support'
                ],
                'vision' => [
                    'ka' => 'საქართველოს სპორტის საერთაშორისო დონეზე მიყვანა',
                    'en' => 'Bringing Georgian sports to international level'
                ],
                'slug' => 'georgian-ministry-sports',
                'type' => 'ministry',
                'status' => 'active',
                'director_name' => 'ლევან კიპიანი',
                'establishment_year' => '2015',
                'logo' => null,
                'website_url' => 'https://sport.gov.ge',
                'email' => 'info@sport.gov.ge',
                'phone' => '+995 32 240 00 00',
                'address' => 'თბილისი, სანაპიროს ქ. 6',
                'facebook' => 'https://facebook.com/georgiansports',
                'instagram' => 'https://instagram.com/georgiansports',
                'twitter' => 'https://twitter.com/georgiansports',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subMonths(12),
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს კინოს ცენტრი',
                    'en' => 'Georgian Film Center'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს კინოს ცენტრი არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია ქართული კინემატოგრაფიის განვითარებაზე, ფილმების პროდიუსირებაზე და კინო ინდუსტრიის მხარდაჭერაზე.</p><p>ცენტრი ფინანსდება ქართული ფილმების პროექტებს და ორგანიზებს კინოფესტივალებს.</p>',
                    'en' => '<p>The Georgian Film Center is a state body responsible for the development of Georgian cinematography, film production, and support of the film industry.</p><p>The center funds Georgian film projects and organizes film festivals.</p>'
                ],
                'mission' => [
                    'ka' => 'ქართული კინემატოგრაფიის განვითარება',
                    'en' => 'Development of Georgian cinematography'
                ],
                'vision' => [
                    'ka' => 'ქართული კინო საერთაშორისო არენაზე წარდგენა',
                    'en' => 'Presenting Georgian cinema on international arena'
                ],
                'slug' => 'georgian-film-center',
                'type' => 'film',
                'status' => 'active',
                'director_name' => 'ნატო ცინცაძე',
                'establishment_year' => '2001',
                'logo' => null,
                'website_url' => 'https://filmcenter.ge',
                'email' => 'info@filmcenter.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, რუსთაველის გამზ. 19',
                'facebook' => 'https://facebook.com/georgianfilmcenter',
                'instagram' => 'https://instagram.com/georgianfilmcenter',
                'twitter' => 'https://twitter.com/georgianfilmcenter',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subMonths(6),
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს ახალგაზრდობის ცენტრი',
                    'en' => 'Georgian Youth Center'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს ახალგაზრდობის ცენტრი არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია ახალგაზრდების მხარდაჭერაზე, განათლებაზე და განვითარებაზე.</p><p>ცენტრი ორგანიზებს ტრენინგებს, სემინარებს და საერთაშორისო პროგრამებს.</p>',
                    'en' => '<p>The Georgian Youth Center is a state body responsible for youth support, education, and development.</p><p>The center organizes training, seminars, and international programs.</p>'
                ],
                'mission' => [
                    'ka' => 'ახალგაზრდების მხარდაჭერა და განვითარება',
                    'en' => 'Youth support and development'
                ],
                'vision' => [
                    'ka' => 'ახალგაზრდების აქტიური მონაწილეობა საზოგადოებაში',
                    'en' => 'Active youth participation in society'
                ],
                'slug' => 'georgian-youth-center',
                'type' => 'youth',
                'status' => 'active',
                'director_name' => 'ანა ბურჭულაძე',
                'establishment_year' => '2010',
                'logo' => null,
                'website_url' => 'https://youthcenter.ge',
                'email' => 'info@youthcenter.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, ჩავჩავაძის ქ. 1',
                'facebook' => 'https://facebook.com/georgianyouthcenter',
                'instagram' => 'https://instagram.com/georgianyouthcenter',
                'twitter' => null,
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subMonths(9),
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს არქივის სამმართველო',
                    'en' => 'Georgian Archives Administration'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს არქივის სამმართველო არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია ისტორიული დოკუმენტების შენახვაზე, კატალოგიზაციაზე და ხელმისაწვდომობაზე.</p><p>სამმართველო მოიცავს ეროვნულ არქივს და რეგიონალურ ფილიალებს.</p>',
                    'en' => '<p>The Georgian Archives Administration is a state body responsible for the storage, cataloging, and accessibility of historical documents.</p><p>The administration includes the national archive and regional branches.</p>'
                ],
                'mission' => [
                    'ka' => 'ისტორიული დოკუმენტების შენახვა და კატალოგიზაცია',
                    'en' => 'Storage and cataloging of historical documents'
                ],
                'vision' => [
                    'ka' => 'ისტორიული მემკვიდრეობის ციფრული არქივის შექმნა',
                    'en' => 'Creating digital archive of historical heritage'
                ],
                'slug' => 'georgian-archives-administration',
                'type' => 'archives',
                'status' => 'active',
                'director_name' => 'თეა ბუხნიკაშვილი',
                'establishment_year' => '1920',
                'logo' => null,
                'website_url' => 'https://archives.ge',
                'email' => 'info@archives.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, ვაჟა-ფშაველას ქ. 1',
                'facebook' => null,
                'instagram' => null,
                'twitter' => null,
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subMonths(3),
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს ბიბლიოთეკების ქსელი',
                    'en' => 'Georgian Library Network'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს ბიბლიოთეკების ქსელი არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია ბიბლიოთეკების მართვაზე, კოლექციების განვითარებაზე და მკითხველთა მომსახურებაზე.</p><p>ქსელი მოიცავს ეროვნულ ბიბლიოთეკას და რეგიონალურ ფილიალებს.</p>',
                    'en' => '<p>The Georgian Library Network is a state body responsible for library management, collection development, and reader services.</p><p>The network includes the national library and regional branches.</p>'
                ],
                'mission' => [
                    'ka' => 'ბიბლიოთეკების მართვა და მკითხველთა მომსახურება',
                    'en' => 'Library management and reader services'
                ],
                'vision' => [
                    'ka' => 'ციფრული ბიბლიოთეკების ქსელის შექმნა',
                    'en' => 'Creating network of digital libraries'
                ],
                'slug' => 'georgian-library-network',
                'type' => 'library',
                'status' => 'active',
                'director_name' => 'გიორგი კეკელიძე',
                'establishment_year' => '1846',
                'logo' => null,
                'website_url' => 'https://library.ge',
                'email' => 'info@library.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, რუსთაველის გამზ. 52',
                'facebook' => 'https://facebook.com/georgianlibrary',
                'instagram' => 'https://instagram.com/georgianlibrary',
                'twitter' => 'https://twitter.com/georgianlibrary',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subMonths(2),
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს სპორტული მედიცინის ცენტრი',
                    'en' => 'Georgian Sports Medicine Center'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს სპორტული მედიცინის ცენტრი არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია სპორტსმენების ჯანმრთელობის მონიტორინგზე, დიაგნოსტიკაზე და რეაბილიტაციაზე.</p><p>ცენტრი მოიცავს თანამედროვე დიაგნოსტიკის ლაბორატორიებს და რეაბილიტაციის დარბაზებს.</p>',
                    'en' => '<p>The Georgian Sports Medicine Center is a state body responsible for monitoring athletes\' health, diagnostics, and rehabilitation.</p><p>The center includes modern diagnostic laboratories and rehabilitation halls.</p>'
                ],
                'mission' => [
                    'ka' => 'სპორტსმენების ჯანმრთელობის მონიტორინგი',
                    'en' => 'Monitoring athletes\' health'
                ],
                'vision' => [
                    'ka' => 'სპორტული მედიცინის საერთაშორისო სტანდარტებამდე მიყვანა',
                    'en' => 'Bringing sports medicine to international standards'
                ],
                'slug' => 'georgian-sports-medicine-center',
                'type' => 'medical',
                'status' => 'active',
                'director_name' => 'დავით ქაფიანიძე',
                'establishment_year' => '2008',
                'logo' => null,
                'website_url' => 'https://sportsmedicine.ge',
                'email' => 'info@sportsmedicine.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, ლისის ქ. 15',
                'facebook' => null,
                'instagram' => null,
                'twitter' => null,
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subMonths(1),
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს კულტურული ტურიზმის ცენტრი',
                    'en' => 'Georgian Cultural Tourism Center'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს კულტურული ტურიზმის ცენტრი არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია კულტურული ტურიზმის განვითარებაზე, ტურისტული მარშრუტების შემუშავებაზე და ტურისტების ინფორმირებაზე.</p><p>ცენტრი ორგანიზებს ტურებს, გამოფენებს და კულტურულ ღონისძიებებს.</p>',
                    'en' => '<p>The Georgian Cultural Tourism Center is a state body responsible for the development of cultural tourism, development of tourist routes, and informing tourists.</p><p>The center organizes tours, exhibitions, and cultural events.</p>'
                ],
                'mission' => [
                    'ka' => 'კულტურული ტურიზმის განვითარება',
                    'en' => 'Development of cultural tourism'
                ],
                'vision' => [
                    'ka' => 'საქართველოს კულტურული ტურიზმის საერთაშორისო ბრენდის შექმნა',
                    'en' => 'Creating international brand of Georgian cultural tourism'
                ],
                'slug' => 'georgian-cultural-tourism-center',
                'type' => 'tourism',
                'status' => 'active',
                'director_name' => 'მარიამ ჯანაშვილი',
                'establishment_year' => '2012',
                'logo' => null,
                'website_url' => 'https://culturaltourism.ge',
                'email' => 'info@culturaltourism.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, რუსთაველის გამზ. 25',
                'facebook' => 'https://facebook.com/georgianculturaltourism',
                'instagram' => 'https://instagram.com/georgianculturaltourism',
                'twitter' => 'https://twitter.com/georgianculturaltourism',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subWeeks(2),
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'name' => [
                    'ka' => 'საქართველოს ხელოვნების აკადემია',
                    'en' => 'Georgian Academy of Arts'
                ],
                'description' => [
                    'ka' => '<p>საქართველოს ხელოვნების აკადემია არის სახელმწიფო ორგანო, რომელიც პასუხისმგებელია ხელოვნების განვითარებაზე, ხელოვანების მხარდაჭერაზე და ხელოვნების განათლებაზე.</p><p>აკადემია მოიცავს ფერწერის, სკულპტურის და გრაფიკის დეპარტამენტებს.</p>',
                    'en' => '<p>The Georgian Academy of Arts is a state body responsible for the development of arts, support of artists, and art education.</p><p>The academy includes departments of painting, sculpture, and graphics.</p>'
                ],
                'mission' => [
                    'ka' => 'ხელოვნების განვითარება და ხელოვანების მხარდაჭერა',
                    'en' => 'Development of arts and support of artists'
                ],
                'vision' => [
                    'ka' => 'ქართული ხელოვნების საერთაშორისო არენაზე წარდგენა',
                    'en' => 'Presenting Georgian arts on international arena'
                ],
                'slug' => 'georgian-academy-arts',
                'type' => 'academy',
                'status' => 'active',
                'director_name' => 'გივი მარგველაშვილი',
                'establishment_year' => '1922',
                'logo' => null,
                'website_url' => 'https://artsacademy.ge',
                'email' => 'info@artsacademy.ge',
                'phone' => '+995 32 299 58 58',
                'address' => 'თბილისი, გრიბოედოვის ქ. 22',
                'facebook' => 'https://facebook.com/georgianartsacademy',
                'instagram' => 'https://instagram.com/georgianartsacademy',
                'twitter' => 'https://twitter.com/georgianartsacademy',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => Carbon::now()->subWeeks(1),
                'sort_order' => 11,
                'is_active' => true,
            ],
        ];

        foreach ($institutions as $institution) {
            SubordinateInstitution::updateOrCreate(
                ['slug' => $institution['slug']],
                $institution
            );
        }
    }
}
