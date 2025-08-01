<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        Competition::truncate();

        $competitions = array (
  0 => 
  array (
    'title' => 'ახალგაზრდა მხატვართა საერთაშორისო კონკურსი',
    'description' => '<p>ახალგაზრდა მხატვართა საერთაშორისო კონკურსი, რომელიც მიზნად ისახავს ახალგაზრდა ხელოვანების მხარდაჭერას და მათი შემოქმედების საერთაშორისო აღიარებას.</p><p>კონკურსში მონაწილეობას მიიღებს 200 მხატვარი 30 ქვეყნიდან.</p>',
    'requirements' => 'მონაწილეობის პირობები ქართულად',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  1 => 
  array (
    'title' => 'ქართული ხალხური ცეკვების ფესტივალი',
    'description' => '<p>ქართული ხალხური ცეკვების საერთაშორისო ფესტივალი, რომელიც მიზნად ისახავს ქართული ცეკვების პოპულარიზაციას და საერთაშორისო გაცვლის ხელშეწყობას.</p><p>ფესტივალში მონაწილეობას მიიღებს 50 ანსამბლი 20 ქვეყნიდან.</p>',
    'requirements' => 'მონაწილეობის პირობები ქართულად',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  2 => 
  array (
    'title' => 'ახალგაზრდა მუსიკოსთა კონკურსი',
    'description' => '<p>ახალგაზრდა მუსიკოსთა საერთაშორისო კონკურსი, რომელიც მოიცავს კლასიკური მუსიკის, ჯაზის და ხალხური მუსიკის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 150 მუსიკოსი 25 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  3 => 
  array (
    'title' => 'ქართული კინოს ფესტივალი',
    'description' => '<p>ქართული კინოს საერთაშორისო ფესტივალი, რომელიც მიზნად ისახავს ქართული კინემატოგრაფიის პრომოციას და საერთაშორისო კოპროდუქციის ხელშეწყობას.</p><p>ფესტივალში მონაწილეობას მიიღებს 100 ფილმი 40 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  4 => 
  array (
    'title' => 'ახალგაზრდა მწერლების კონკურსი',
    'description' => '<p>ახალგაზრდა მწერლების საერთაშორისო კონკურსი, რომელიც მოიცავს პროზის, პოეზიის და დრამატურგიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 300 მწერალი 35 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  5 => 
  array (
    'title' => 'სპორტული ტალანტების კონკურსი',
    'description' => '<p>ახალგაზრდა სპორტსმენთა საერთაშორისო კონკურსი, რომელიც მოიცავს ფეხბურთს, კალათბურთს, ცურვას და ფეხბურთს.</p><p>კონკურსში მონაწილეობას მიიღებს 500 სპორტსმენი 30 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  6 => 
  array (
    'title' => 'ფოტოგრაფიის კონკურსი',
    'description' => '<p>ფოტოგრაფიის საერთაშორისო კონკურსი, რომელიც მოიცავს ნატურის, პორტრეტის და დოკუმენტური ფოტოგრაფიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 1000 ფოტოგრაფი 50 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  7 => 
  array (
    'title' => 'დიზაინის კონკურსი',
    'description' => '<p>დიზაინის საერთაშორისო კონკურსი, რომელიც მოიცავს ინდუსტრიული დიზაინის, გრაფიკული დიზაინის და ფეშენ დიზაინის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 400 დიზაინერი 25 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  8 => 
  array (
    'title' => 'არქიტექტურის კონკურსი',
    'description' => '<p>არქიტექტურის საერთაშორისო კონკურსი, რომელიც მიზნად ისახავს მდგრადი და ინოვაციური არქიტექტურული გადაწყვეტების პრომოციას.</p><p>კონკურსში მონაწილეობას მიიღებს 200 არქიტექტორი 30 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  9 => 
  array (
    'title' => 'კულინარიის კონკურსი',
    'description' => '<p>კულინარიის საერთაშორისო კონკურსი, რომელიც მოიცავს ქართული სამზარეულოს და საერთაშორისო კულინარიის კატეგორიებს.</p><p>კონკურსში მონაწილეობას მიიღებს 150 შეფ-მზარეული 20 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
  10 => 
  array (
    'title' => 'ცირკის ხელოვნების ფესტივალი',
    'description' => '<p>ცირკის ხელოვნების საერთაშორისო ფესტივალი, რომელიც მოიცავს აკრობატიკას, ჯონგლიორობას და კლოუნადას.</p><p>ფესტივალში მონაწილეობას მიიღებს 100 მსახიობი 15 ქვეყნიდან.</p>',
    'requirements' => '',
    'deadline' => NULL,
    'budget' => NULL,
    'contact_info' => NULL,
    'image' => NULL,
    'attachments' => NULL,
    'is_active' => true,
    'registration_deadline' => NULL,
  ),
);

        foreach ($competitions as $competitionData) {
            Competition::create($competitionData);
        }

        $this->command->info('Competitions seeded with current database data!');
    }
}