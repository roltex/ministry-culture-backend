<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Available news images
        $newsImages = [
            '01JYBHEEXVSAKQWJNZM2V281NK.jpg',
            '01JYBHBXFQ2MBKYQB7M1YK8R96.jpeg',
            '01JYBHABJAH0Q67204VHP1HFEC.jpg',
            '01JYBH4YDFZRPR0X3YBZRB6QC1.png',
            '01JYBH217QK2TNBD7XNC6D3W73.jpg',
            '01JYBGZ218QYKKD3NBF17AK9CK.jpg',
            '01JYBGWZ1HPSV7FRRGF6YDTRG1.jpg',
            '01JYBGS9R3EBJ9135PP22F6X3V.jpg',
            '01JYA3S0ZYN5GF304PPCKBDKZX.jpg',
            '01JYA3Q258SZFBK1C6YJ9PDE8Y.jpg',
            '01JYA3MWMJKJ88N15T35EM0XEA.jpeg',
            '01JYA3KSSY6NHCRY9DW9H820SR.jpg',
            '01JY9ZFW3SNCYACYGRF0ZQWVSQ.jpg',
            '01JY7J5A93NYKBG2P821NX3THC.jpg',
            '01JY7GF46R24K8A1MCNWV6X3N7.jpeg',
            '01JY7DZB5HT6M8YDK074Q243CA.jpg',
        ];

        $news = [
            [
                'title' => [
                    'ka' => 'საქართველოს კულტურის სამინისტროს ახალი ციფრული პლატფორმა',
                    'en' => 'New Digital Platform for Ministry of Culture of Georgia'
                ],
                'content' => [
                    'ka' => '<p>საქართველოს კულტურის, სპორტისა და ახალგაზრდობის სამინისტრო აცხადებს ახალი ციფრული პლატფორმის გაშვებას, რომელიც მიზნად ისახავს კულტურული მემკვიდრეობის ციფრულ ფორმატში შენახვას და მის ხელმისაწვდომობას მთელი მსოფლიოსთვის.</p><p>პლატფორმა მოიცავს 3D სკანირებას, ვირტუალურ ტურებს და ინტერაქტიულ გამოცდილებებს.</p>',
                    'en' => '<p>The Ministry of Culture, Sport and Youth of Georgia announces the launch of a new digital platform aimed at preserving cultural heritage in digital format and making it accessible to the whole world.</p><p>The platform includes 3D scanning, virtual tours, and interactive experiences.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ახალი ციფრული პლატფორმა კულტურული მემკვიდრეობის შენარჩუნებისთვის',
                    'en' => 'New digital platform for preserving cultural heritage'
                ],
                'slug' => 'new-digital-platform-ministry-culture',
                'featured_image' => 'news-images/' . $newsImages[0],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => [
                    'ka' => 'ქართული კინოს ფესტივალი ბერლინში',
                    'en' => 'Georgian Film Festival in Berlin'
                ],
                'content' => [
                    'ka' => '<p>ბერლინის საერთაშორისო კინოფესტივალში წარმოდგენილი იქნება ქართული კინემატოგრაფიის საუკეთესო ნიმუშები. ფესტივალში მონაწილეობას მიიღებს 10 ქართული ფილმი.</p><p>ეს არის ქართული კინოს საერთაშორისო აღიარების მნიშვნელოვანი ნაბიჯი.</p>',
                    'en' => '<p>The best examples of Georgian cinematography will be presented at the Berlin International Film Festival. 10 Georgian films will participate in the festival.</p><p>This is an important step in the international recognition of Georgian cinema.</p>'
                ],
                'excerpt' => [
                    'ka' => '10 ქართული ფილმი ბერლინის კინოფესტივალში',
                    'en' => '10 Georgian films at Berlin Film Festival'
                ],
                'slug' => 'georgian-film-festival-berlin',
                'featured_image' => 'news-images/' . $newsImages[1],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა სპორტსმენების მხარდაჭერის პროგრამა',
                    'en' => 'Youth Athletes Support Program'
                ],
                'content' => [
                    'ka' => '<p>სამინისტრო აცხადებს ახალ პროგრამას ახალგაზრდა სპორტსმენების მხარდაჭერისთვის. პროგრამა მოიცავს ფინანსურ მხარდაჭერას, ტრენინგებს და საერთაშორისო ტურნირებში მონაწილეობის შესაძლებლობას.</p><p>პროგრამის ბიუჯეტი შეადგენს 1 მილიონ ლარს.</p>',
                    'en' => '<p>The Ministry announces a new program to support young athletes. The program includes financial support, training, and opportunities to participate in international tournaments.</p><p>The program budget is 1 million GEL.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ახალი პროგრამა ახალგაზრდა სპორტსმენებისთვის',
                    'en' => 'New program for young athletes'
                ],
                'slug' => 'youth-athletes-support-program',
                'featured_image' => 'news-images/' . $newsImages[2],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => [
                    'ka' => 'ეროვნული მუზეუმის რენოვაცია',
                    'en' => 'National Museum Renovation'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება ეროვნული მუზეუმის მასშტაბური რენოვაცია. პროექტი მოიცავს ახალ გამოფენის დარბაზებს, თანამედროვე ტექნოლოგიების დანერგვას და უსაფრთხოების სისტემების გაუმჯობესებას.</p><p>რენოვაცია დასრულდება 2026 წელს.</p>',
                    'en' => '<p>A large-scale renovation of the National Museum will begin. The project includes new exhibition halls, introduction of modern technologies, and improvement of security systems.</p><p>The renovation will be completed in 2026.</p>'
                ],
                'excerpt' => [
                    'ka' => 'ეროვნული მუზეუმის მასშტაბური რენოვაცია',
                    'en' => 'Large-scale renovation of National Museum'
                ],
                'slug' => 'national-museum-renovation',
                'featured_image' => 'news-images/' . $newsImages[3],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'title' => [
                    'ka' => 'ქართული ხალხური ცეკვების ფესტივალი',
                    'en' => 'Georgian Folk Dance Festival'
                ],
                'content' => [
                    'ka' => '<p>თბილისში გაიმართება ქართული ხალხური ცეკვების საერთაშორისო ფესტივალი. ფესტივალში მონაწილეობას მიიღებს 15 ქვეყნის 50-ზე მეტი ანსამბლი.</p><p>ფესტივალი მიზნად ისახავს ქართული ცეკვების პოპულარიზაციას.</p>',
                    'en' => '<p>An international festival of Georgian folk dances will be held in Tbilisi. More than 50 ensembles from 15 countries will participate in the festival.</p><p>The festival aims to popularize Georgian dances.</p>'
                ],
                'excerpt' => [
                    'ka' => '50-ზე მეტი ანსამბლი 15 ქვეყნიდან',
                    'en' => 'More than 50 ensembles from 15 countries'
                ],
                'slug' => 'georgian-folk-dance-festival',
                'featured_image' => 'news-images/' . $newsImages[4],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მხატვართა გრანტის პროგრამა',
                    'en' => 'Young Artists Grant Program'
                ],
                'content' => [
                    'ka' => '<p>სამინისტრო აცხადებს გრანტების პროგრამას ახალგაზრდა მხატვრებისთვის. პროგრამა მოიცავს 50 ახალგაზრდა მხატვარს, რომლებიც მიიღებენ 10,000 ლარამდე გრანტს.</p><p>გრანტები გამოიყენება პროექტების განსახორციელებლად.</p>',
                    'en' => '<p>The Ministry announces a grant program for young artists. The program includes 50 young artists who will receive grants up to 10,000 GEL.</p><p>Grants will be used to implement projects.</p>'
                ],
                'excerpt' => [
                    'ka' => '50 ახალგაზრდა მხატვარი მიიღებს გრანტს',
                    'en' => '50 young artists will receive grants'
                ],
                'slug' => 'young-artists-grant-program',
                'featured_image' => 'news-images/' . $newsImages[5],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(6),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული ინფრასტრუქტურის განვითარება',
                    'en' => 'Sports Infrastructure Development'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება სპორტული ინფრასტრუქტურის მასშტაბური განვითარება რეგიონებში. პროექტი მოიცავს 20 ახალი სპორტული ცენტრის მშენებლობას.</p><p>პროექტის ღირებულება შეადგენს 15 მილიონ ლარს.</p>',
                    'en' => '<p>Large-scale development of sports infrastructure will begin in the regions. The project includes the construction of 20 new sports centers.</p><p>The project cost is 15 million GEL.</p>'
                ],
                'excerpt' => [
                    'ka' => '20 ახალი სპორტული ცენტრი რეგიონებში',
                    'en' => '20 new sports centers in regions'
                ],
                'slug' => 'sports-infrastructure-development',
                'featured_image' => 'news-images/' . $newsImages[6],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => [
                    'ka' => 'ქართული ლიტერატურის პრომოცია',
                    'en' => 'Georgian Literature Promotion'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება ქართული ლიტერატურის საერთაშორისო პრომოციის პროგრამა. პროგრამა მოიცავს ქართული წიგნების თარგმნას და საერთაშორისო ბაზრებზე გამოცემას.</p><p>პროგრამაში მონაწილეობას მიიღებს 100 ქართული ავტორი.</p>',
                    'en' => '<p>An international promotion program for Georgian literature will begin. The program includes translation and publication of Georgian books in international markets.</p><p>100 Georgian authors will participate in the program.</p>'
                ],
                'excerpt' => [
                    'ka' => '100 ქართული ავტორი საერთაშორისო ბაზრებზე',
                    'en' => '100 Georgian authors in international markets'
                ],
                'slug' => 'georgian-literature-promotion',
                'featured_image' => 'news-images/' . $newsImages[7],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ღონისძიებების კალენდარი',
                    'en' => 'Cultural Events Calendar'
                ],
                'content' => [
                    'ka' => '<p>გამოქვეყნდა 2025 წლის კულტურული ღონისძიებების კალენდარი. კალენდარი მოიცავს 200-ზე მეტ ღონისძიებას მთელი საქართველოს მასშტაბით.</p><p>ყველა ღონისძიება უფასო იქნება ხალხისთვის.</p>',
                    'en' => '<p>The 2025 cultural events calendar has been published. The calendar includes more than 200 events throughout Georgia.</p><p>All events will be free for the public.</p>'
                ],
                'excerpt' => [
                    'ka' => '200-ზე მეტი ღონისძიება 2025 წელს',
                    'en' => 'More than 200 events in 2025'
                ],
                'slug' => 'cultural-events-calendar-2025',
                'featured_image' => 'news-images/' . $newsImages[8],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(9),
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მუსიკოსთა კონკურსი',
                    'en' => 'Young Musicians Competition'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება ახალგაზრდა მუსიკოსთა საერთაშორისო კონკურსი. კონკურსში მონაწილეობას მიიღებს 150 მუსიკოსი 25 ქვეყნიდან.</p><p>გამარჯვებული მიიღებს 50,000 ლარის პრიზს.</p>',
                    'en' => '<p>An international competition for young musicians will begin. 150 musicians from 25 countries will participate in the competition.</p><p>The winner will receive a prize of 50,000 GEL.</p>'
                ],
                'excerpt' => [
                    'ka' => '150 მუსიკოსი 25 ქვეყნიდან',
                    'en' => '150 musicians from 25 countries'
                ],
                'slug' => 'young-musicians-international-competition',
                'featured_image' => 'news-images/' . $newsImages[9],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული მიღწევების ცერემონია',
                    'en' => 'Sports Achievements Ceremony'
                ],
                'content' => [
                    'ka' => '<p>გაიმართება სპორტული მიღწევების ყოველწლიური ცერემონია. ცერემონიაზე დაჯილდოვდება საქართველოს საუკეთესო სპორტსმენები.</p><p>ცერემონია გაიმართება თბილისის სახელმწიფო ფილარმონიაში.</p>',
                    'en' => '<p>An annual sports achievements ceremony will be held. The best athletes of Georgia will be awarded at the ceremony.</p><p>The ceremony will be held at the Tbilisi State Philharmonic.</p>'
                ],
                'excerpt' => [
                    'ka' => 'საქართველოს საუკეთესო სპორტსმენები დაჯილდოვდებიან',
                    'en' => 'Best athletes of Georgia will be awarded'
                ],
                'slug' => 'sports-achievements-ceremony',
                'featured_image' => 'news-images/' . $newsImages[10],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(11),
            ],
            [
                'title' => [
                    'ka' => 'კულტურული მემკვიდრეობის დაცვა',
                    'en' => 'Cultural Heritage Protection'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება კულტურული მემკვიდრეობის დაცვის ახალი პროგრამა. პროგრამა მოიცავს ისტორიული ძეგლების რესტავრაციას და კონსერვაციას.</p><p>პროგრამაში ჩართული იქნება 50 ისტორიული ძეგლი.</p>',
                    'en' => '<p>A new cultural heritage protection program will begin. The program includes restoration and conservation of historical monuments.</p><p>50 historical monuments will be included in the program.</p>'
                ],
                'excerpt' => [
                    'ka' => '50 ისტორიული ძეგლი რესტავრაციის პროცესში',
                    'en' => '50 historical monuments in restoration process'
                ],
                'slug' => 'cultural-heritage-protection',
                'featured_image' => 'news-images/' . $newsImages[11],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მწერლების ფესტივალი',
                    'en' => 'Young Writers Festival'
                ],
                'content' => [
                    'ka' => '<p>თბილისში გაიმართება ახალგაზრდა მწერლების საერთაშორისო ფესტივალი. ფესტივალში მონაწილეობას მიიღებს 100 მწერალი 30 ქვეყნიდან.</p><p>ფესტივალი მიზნად ისახავს ლიტერატურული ნაწარმოებების პოპულარიზაციას.</p>',
                    'en' => '<p>An international festival for young writers will be held in Tbilisi. 100 writers from 30 countries will participate in the festival.</p><p>The festival aims to popularize literary works.</p>'
                ],
                'excerpt' => [
                    'ka' => '100 მწერალი 30 ქვეყნიდან',
                    'en' => '100 writers from 30 countries'
                ],
                'slug' => 'young-writers-international-festival',
                'featured_image' => 'news-images/' . $newsImages[12],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(13),
            ],
            [
                'title' => [
                    'ka' => 'სპორტული მედიის განვითარება',
                    'en' => 'Sports Media Development'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება სპორტული მედიის განვითარების პროგრამა. პროგრამა მოიცავს ახალგაზრდა ჟურნალისტების ტრენინგს და სპორტული კონტენტის შექმნას.</p><p>პროგრამაში მონაწილეობას მიიღებს 25 ჟურნალისტი.</p>',
                    'en' => '<p>A sports media development program will begin. The program includes training for young journalists and creation of sports content.</p><p>25 journalists will participate in the program.</p>'
                ],
                'excerpt' => [
                    'ka' => '25 ჟურნალისტი სპორტული მედიის პროგრამაში',
                    'en' => '25 journalists in sports media program'
                ],
                'slug' => 'sports-media-development',
                'featured_image' => 'news-images/' . $newsImages[13],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(14),
            ],
            [
                'title' => [
                    'ka' => 'კულტურული ტურიზმის პრომოცია',
                    'en' => 'Cultural Tourism Promotion'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება კულტურული ტურიზმის საერთაშორისო პრომოციის კამპანია. კამპანია მოიცავს საქართველოს კულტურული ღირსშესანიშნაობების პოპულარიზაციას.</p><p>კამპანია მიმართული იქნება 20 ქვეყნის ტურისტებზე.</p>',
                    'en' => '<p>An international cultural tourism promotion campaign will begin. The campaign includes popularization of Georgia\'s cultural attractions.</p><p>The campaign will target tourists from 20 countries.</p>'
                ],
                'excerpt' => [
                    'ka' => 'საქართველოს კულტურული ღირსშესანიშნაობები 20 ქვეყანაში',
                    'en' => 'Georgia\'s cultural attractions in 20 countries'
                ],
                'slug' => 'cultural-tourism-promotion',
                'featured_image' => 'news-images/' . $newsImages[14],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title' => [
                    'ka' => 'ახალგაზრდა მოცეკვავეთა კონკურსი',
                    'en' => 'Young Dancers Competition'
                ],
                'content' => [
                    'ka' => '<p>დაიწყება ახალგაზრდა მოცეკვავეთა საერთაშორისო კონკურსი. კონკურსში მონაწილეობას მიიღებს 200 მოცეკვავე 40 ქვეყნიდან.</p><p>გამარჯვებული მიიღებს 30,000 ლარის პრიზს.</p>',
                    'en' => '<p>An international competition for young dancers will begin. 200 dancers from 40 countries will participate in the competition.</p><p>The winner will receive a prize of 30,000 GEL.</p>'
                ],
                'excerpt' => [
                    'ka' => '200 მოცეკვავე 40 ქვეყნიდან',
                    'en' => '200 dancers from 40 countries'
                ],
                'slug' => 'young-dancers-international-competition',
                'featured_image' => 'news-images/' . $newsImages[15],
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(16),
            ],
        ];

        foreach ($news as $newsItem) {
            News::create($newsItem);
        }
    }
} 