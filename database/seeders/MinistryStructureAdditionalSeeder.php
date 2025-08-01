<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MinistryStructure;
use App\Models\MinistryStructureAttachment;

class MinistryStructureAdditionalSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing root structures or create new ones
        $existingRoots = MinistryStructure::whereNull('parent_id')->get();
        
        if ($existingRoots->isEmpty()) {
            // If no roots exist, create a basic structure
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
        } else {
            $root = $existingRoots->first();
        }

        // Add more departments under the root
        $departments = [
            [
                'name' => [
                    'ka' => 'მუსიკის დეპარტამენტი',
                    'en' => 'Department of Music',
                ],
                'description' => [
                    'ka' => '<p><strong>მუსიკის დეპარტამენტი</strong> პასუხისმგებელია საქართველოს მუსიკალური მემკვიდრეობის დაცვასა და განვითარებაზე.</p><p>დეპარტამენტი მართავს მუსიკალურ სკოლებს, ორკესტრებს და ფესტივალებს.</p>',
                    'en' => '<p><strong>Department of Music</strong> is responsible for preserving and developing Georgia\'s musical heritage.</p><p>The department manages music schools, orchestras, and festivals.</p>',
                ],
                'address' => [
                    'ka' => 'თბილისი, მელიქიშვილის ქ. 8',
                    'en' => 'Tbilisi, Melikishvili St. 8',
                ],
                'email' => 'music@culture.gov.ge',
                'phone' => '+995 32 2 444 444',
                'position' => [
                    'ka' => 'დეპარტამენტის ხელმძღვანელი',
                    'en' => 'Department Head',
                ],
            ],
            [
                'name' => [
                    'ka' => 'თეატრის დეპარტამენტი',
                    'en' => 'Department of Theater',
                ],
                'description' => [
                    'ka' => '<p><strong>თეატრის დეპარტამენტი</strong> ხელს უწყობს თეატრალური ხელოვნების განვითარებას და თეატრების მხარდაჭერას.</p><p>დეპარტამენტი ორგანიზებს საერთაშორისო თეატრალურ ფესტივალებს.</p>',
                    'en' => '<p><strong>Department of Theater</strong> promotes the development of theatrical arts and supports theaters.</p><p>The department organizes international theater festivals.</p>',
                ],
                'address' => [
                    'ka' => 'თბილისი, რუსთაველის გამზირი 17',
                    'en' => 'Tbilisi, Rustaveli Ave 17',
                ],
                'email' => 'theater@culture.gov.ge',
                'phone' => '+995 32 2 555 555',
                'position' => [
                    'ka' => 'დეპარტამენტის ხელმძღვანელი',
                    'en' => 'Department Head',
                ],
            ],
            [
                'name' => [
                    'ka' => 'კინოს დეპარტამენტი',
                    'en' => 'Department of Cinema',
                ],
                'description' => [
                    'ka' => '<p><strong>კინოს დეპარტამენტი</strong> მხარს უჭერს ქართული კინემატოგრაფიის განვითარებას და კინოფესტივალების ორგანიზებას.</p><p>დეპარტამენტი ფინანსდება კინოპროექტებს და ახალგაზრდა რეჟისორებს.</p>',
                    'en' => '<p><strong>Department of Cinema</strong> supports the development of Georgian cinematography and organizes film festivals.</p><p>The department funds film projects and young directors.</p>',
                ],
                'address' => [
                    'ka' => 'თბილისი, აღმაშენებლის გამზირი 150',
                    'en' => 'Tbilisi, Agmashenebeli Ave 150',
                ],
                'email' => 'cinema@culture.gov.ge',
                'phone' => '+995 32 2 666 666',
                'position' => [
                    'ka' => 'დეპარტამენტის ხელმძღვანელი',
                    'en' => 'Department Head',
                ],
            ],
        ];

        foreach ($departments as $deptData) {
            $department = MinistryStructure::create([
                'name' => $deptData['name'],
                'description' => $deptData['description'],
                'address' => $deptData['address'],
                'email' => $deptData['email'],
                'phone' => $deptData['phone'],
                'position' => $deptData['position'],
                'facebook_url' => null,
                'twitter_url' => null,
                'instagram_url' => null,
                'linkedin_url' => null,
                'youtube_url' => null,
                'telegram_url' => null,
                'image' => null,
                'parent_id' => $root->id,
            ]);

            // Add sub-departments for each department
            $subDepartments = [
                [
                    'name' => [
                        'ka' => 'კლასიკური მუსიკის განყოფილება',
                        'en' => 'Classical Music Division',
                    ],
                    'description' => [
                        'ka' => 'კლასიკური მუსიკის განვითარება და ორკესტრების მხარდაჭერა.',
                        'en' => 'Development of classical music and support for orchestras.',
                    ],
                    'email' => 'classical@culture.gov.ge',
                    'phone' => '+995 32 2 777 777',
                ],
                [
                    'name' => [
                        'ka' => 'ფოლკლორული მუსიკის განყოფილება',
                        'en' => 'Folk Music Division',
                    ],
                    'description' => [
                        'ka' => 'ქართული ფოლკლორული მუსიკის შენარჩუნება და პოპულარიზაცია.',
                        'en' => 'Preservation and popularization of Georgian folk music.',
                    ],
                    'email' => 'folk@culture.gov.ge',
                    'phone' => '+995 32 2 888 888',
                ],
            ];

            foreach ($subDepartments as $subDeptData) {
                MinistryStructure::create([
                    'name' => $subDeptData['name'],
                    'description' => $subDeptData['description'],
                    'address' => $deptData['address'], // Same address as parent
                    'email' => $subDeptData['email'],
                    'phone' => $subDeptData['phone'],
                    'facebook_url' => null,
                    'twitter_url' => null,
                    'instagram_url' => null,
                    'linkedin_url' => null,
                    'youtube_url' => null,
                    'telegram_url' => null,
                    'image' => null,
                    'parent_id' => $department->id,
                ]);
            }
        }

        // Add some individual positions with detailed bios
        $individuals = [
            [
                'name' => [
                    'ka' => 'ბექა დავითულიანი',
                    'en' => 'Beka Davituliani',
                ],
                'description' => [
                    'ka' => '<p><strong>ბექა დავითულიანი</strong><br><br>1999-2004 წლებში იყო ა/ო „სტუდენტთა საექსპედიციო მოძრაობა" გამგეობის თავმჯდომარე. 2002-2004 წლებში იყო სს „ხიდმშენის" იურის-კონსულტანტი, მენეჯერი. 2004-2010 წლებში იყო საქართველოს ფინანსთა სამინისტროს შემოსავლების სამსახურის ინსპექტორ-გამომძიებელი. 2010-2013 წლებში მუშაობდა ჟურნალ „ლიბერალში". 2010-2012 წლებში იყო შპს „მედიაჰაუსი დეკომი" იურისტ-კონსულტანტი. ამავე წლებში იყო შპს „სახელმწიფო უზრუნველყოფის" სპეციალისტი. 2013 წელს იყო შსს საზოგადოებასთან ურთიერთობის დეპარტამენტის ახალი მედიის მართვის სპეციალისტი. 2013-2014 წლებში იყო</p>',
                    'en' => '<p><strong>Beka Davituliani</strong><br><br>From 1999-2004, he was the chairman of the board of "Student Expedition Movement" LLC. From 2002-2004, he was a legal consultant and manager at "Khidmsheni" LLC. From 2004-2010, he was an inspector-investigator at the Revenue Service of the Ministry of Finance of Georgia. From 2010-2013, he worked at "Liberal" magazine. From 2010-2012, he was a legal consultant at "Media House Dekomi" LLC. During the same years, he was a specialist at "State Security" LLC. In 2013, he was a new media management specialist at the Department of Public Relations of the State Security Service. From 2013-2014, he was</p>',
                ],
                'position' => [
                    'ka' => 'მუსიკის დეპარტამენტის ხელმძღვანელი',
                    'en' => 'Head of Music Department',
                ],
                'email' => 'beka.davituliani@culture.gov.ge',
                'phone' => '+995 32 2 999 999',
                'address' => [
                    'ka' => 'თბილისი, მელიქიშვილის ქ. 8',
                    'en' => 'Tbilisi, Melikishvili St. 8',
                ],
            ],
            [
                'name' => [
                    'ka' => 'ნინო ბერიძე',
                    'en' => 'Nino Beridze',
                ],
                'description' => [
                    'ka' => '<p><strong>ნინო ბერიძე</strong> არის გამოცდილი თეატრალური რეჟისორი და პედაგოგი. 2005-2015 წლებში მუშაობდა თბილისის მარიონეტების თეატრში რეჟისორად. 2015-2020 წლებში იყო თბილისის თეატრალური ინსტიტუტის პროფესორი. 2020 წლიდან არის თეატრის დეპარტამენტის ხელმძღვანელი.</p><p>მისი ნამუშევრები ნაჩვენებია საერთაშორისო ფესტივალებზე და მიღებული აქვს მრავალი ჯილდო.</p>',
                    'en' => '<p><strong>Nino Beridze</strong> is an experienced theater director and pedagogue. From 2005-2015, she worked as a director at the Tbilisi Marionette Theater. From 2015-2020, she was a professor at the Tbilisi Theater Institute. Since 2020, she has been the head of the Theater Department.</p><p>Her works have been shown at international festivals and she has received many awards.</p>',
                ],
                'position' => [
                    'ka' => 'თეატრის დეპარტამენტის ხელმძღვანელი',
                    'en' => 'Head of Theater Department',
                ],
                'email' => 'nino.beridze@culture.gov.ge',
                'phone' => '+995 32 2 101 010',
                'address' => [
                    'ka' => 'თბილისი, რუსთაველის გამზირი 17',
                    'en' => 'Tbilisi, Rustaveli Ave 17',
                ],
            ],
        ];

        foreach ($individuals as $personData) {
            MinistryStructure::create([
                'name' => $personData['name'],
                'description' => $personData['description'],
                'position' => $personData['position'],
                'address' => $personData['address'],
                'email' => $personData['email'],
                'phone' => $personData['phone'],
                'facebook_url' => null,
                'twitter_url' => null,
                'instagram_url' => null,
                'linkedin_url' => null,
                'youtube_url' => null,
                'telegram_url' => null,
                'image' => null,
                'parent_id' => $root->id,
            ]);
        }
    }
} 