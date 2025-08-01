<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calendar;

class CalendarSeeder extends Seeder
{
    public function run(): void
    {
        Calendar::truncate();

        $calendar = array (
  0 => 
  array (
    'title' => 'კულტურის ფესტივალი 2025',
    'description' => NULL,
    'start_date' => NULL,
    'end_date' => NULL,
    'location' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => NULL,
  ),
  1 => 
  array (
    'title' => 'ქართული ხალხური ცეკვების შოუ',
    'description' => NULL,
    'start_date' => NULL,
    'end_date' => NULL,
    'location' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => NULL,
  ),
  2 => 
  array (
    'title' => 'ქართული კულინარიის ფესტივალი',
    'description' => NULL,
    'start_date' => NULL,
    'end_date' => NULL,
    'location' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => NULL,
  ),
  3 => 
  array (
    'title' => 'ქართული ხელოვნების გამოფენა',
    'description' => NULL,
    'start_date' => NULL,
    'end_date' => NULL,
    'location' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => NULL,
  ),
  4 => 
  array (
    'title' => 'ქართული მუსიკის ფესტივალი',
    'description' => NULL,
    'start_date' => NULL,
    'end_date' => NULL,
    'location' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => NULL,
  ),
);

        foreach ($calendar as $calendarData) {
            Calendar::create($calendarData);
        }

        $this->command->info('Calendar seeded with current database data!');
    }
}