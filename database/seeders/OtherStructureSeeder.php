<?php

namespace Database\Seeders;

use App\Models\OtherStructure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OtherStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $structures = [
            [
                'title' => [
                    'ka' => 'საქართველოს ეროვნული არქივი',
                    'en' => 'Georgian National Archive'
                ],
                'image' => 'other-structure-images/national-archive.jpg',
                'link' => 'https://archives.gov.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს ეროვნული ბიბლიოთეკა',
                    'en' => 'Georgian National Library'
                ],
                'image' => 'other-structure-images/national-library.jpg',
                'link' => 'https://nplg.gov.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს ეროვნული მუზეუმი',
                    'en' => 'Georgian National Museum'
                ],
                'image' => 'other-structure-images/national-museum.jpg',
                'link' => 'https://museum.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს ხელოვნების აკადემია',
                    'en' => 'Georgian Academy of Arts'
                ],
                'image' => 'other-structure-images/arts-academy.jpg',
                'link' => 'https://artsacademy.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს მეცნიერებათა აკადემია',
                    'en' => 'Georgian Academy of Sciences'
                ],
                'image' => 'other-structure-images/sciences-academy.jpg',
                'link' => 'https://science.org.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს კულტურის ფონდი',
                    'en' => 'Georgian Cultural Foundation'
                ],
                'image' => 'other-structure-images/cultural-foundation.jpg',
                'link' => 'https://culturalfoundation.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს ფოლკლორის სახელმწიფო ცენტრი',
                    'en' => 'Georgian State Folklore Center'
                ],
                'image' => 'other-structure-images/folklore-center.jpg',
                'link' => 'https://folklore.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს თეატრის საზოგადოება',
                    'en' => 'Georgian Theatre Society'
                ],
                'image' => 'other-structure-images/theatre-society.jpg',
                'link' => 'https://theatresociety.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს კინემატოგრაფიის ცენტრი',
                    'en' => 'Georgian Cinematography Center'
                ],
                'image' => 'other-structure-images/cinematography-center.jpg',
                'link' => 'https://cinema.ge'
            ],
            [
                'title' => [
                    'ka' => 'საქართველოს მუსიკალური საზოგადოება',
                    'en' => 'Georgian Musical Society'
                ],
                'image' => 'other-structure-images/musical-society.jpg',
                'link' => 'https://musicalsociety.ge'
            ]
        ];

        foreach ($structures as $structure) {
            OtherStructure::create($structure);
        }
    }
}
