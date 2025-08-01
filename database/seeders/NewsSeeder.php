<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::truncate();

        $news = array (
  0 => 
  array (
    'title' => 'საქართველოს კულტურის სამინისტროს ახალი ციფრული პლატფორმა',
    'content' => '<p>საქართველოს კულტურის, სპორტისა და ახალგაზრდობის სამინისტრო აცხადებს ახალი ციფრული პლატფორმის გაშვებას, რომელიც მიზნად ისახავს კულტურული მემკვიდრეობის ციფრულ ფორმატში შენახვას და მის ხელმისაწვდომობას მთელი მსოფლიოსთვის.</p><p>პლატფორმა მოიცავს 3D სკანირებას, ვირტუალურ ტურებს და ინტერაქტიულ გამოცდილებებს.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '0000000000000aa20000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-11 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  1 => 
  array (
    'title' => 'ქართული კინოს ფესტივალი ბერლინში',
    'content' => '<p>ბერლინის საერთაშორისო კინოფესტივალში წარმოდგენილი იქნება ქართული კინემატოგრაფიის საუკეთესო ნიმუშები. ფესტივალში მონაწილეობას მიიღებს 10 ქართული ფილმი.</p><p>ეს არის ქართული კინოს საერთაშორისო აღიარების მნიშვნელოვანი ნაბიჯი.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '0000000000000b6d0000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-10 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  2 => 
  array (
    'title' => 'ახალგაზრდა სპორტსმენების მხარდაჭერის პროგრამა',
    'content' => '<p>სამინისტრო აცხადებს ახალ პროგრამას ახალგაზრდა სპორტსმენების მხარდაჭერისთვის. პროგრამა მოიცავს ფინანსურ მხარდაჭერას, ტრენინგებს და საერთაშორისო ტურნირებში მონაწილეობის შესაძლებლობას.</p><p>პროგრამის ბიუჯეტი შეადგენს 1 მილიონ ლარს.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '0000000000000b710000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-09 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  3 => 
  array (
    'title' => 'ეროვნული მუზეუმის რენოვაცია',
    'content' => '<p>დაიწყება ეროვნული მუზეუმის მასშტაბური რენოვაცია. პროექტი მოიცავს ახალ გამოფენის დარბაზებს, თანამედროვე ტექნოლოგიების დანერგვას და უსაფრთხოების სისტემების გაუმჯობესებას.</p><p>რენოვაცია დასრულდება 2026 წელს.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '000000000000094c0000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-08 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  4 => 
  array (
    'title' => 'ქართული ხალხური ცეკვების ფესტივალი',
    'content' => '<p>თბილისში გაიმართება ქართული ხალხური ცეკვების საერთაშორისო ფესტივალი. ფესტივალში მონაწილეობას მიიღებს 15 ქვეყნის 50-ზე მეტი ანსამბლი.</p><p>ფესტივალი მიზნად ისახავს ქართული ცეკვების პოპულარიზაციას.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '00000000000007960000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-07 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  5 => 
  array (
    'title' => 'ახალგაზრდა მხატვართა გრანტის პროგრამა',
    'content' => '<p>სამინისტრო აცხადებს გრანტების პროგრამას ახალგაზრდა მხატვრებისთვის. პროგრამა მოიცავს 50 ახალგაზრდა მხატვარს, რომლებიც მიიღებენ 10,000 ლარამდე გრანტს.</p><p>გრანტები გამოიყენება პროექტების განსახორციელებლად.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '00000000000007f90000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-06 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  6 => 
  array (
    'title' => 'სპორტული ინფრასტრუქტურის განვითარება',
    'content' => '<p>დაიწყება სპორტული ინფრასტრუქტურის მასშტაბური განვითარება რეგიონებში. პროექტი მოიცავს 20 ახალი სპორტული ცენტრის მშენებლობას.</p><p>პროექტის ღირებულება შეადგენს 15 მილიონ ლარს.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '00000000000008950000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-05 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  7 => 
  array (
    'title' => 'ქართული ლიტერატურის პრომოცია',
    'content' => '<p>დაიწყება ქართული ლიტერატურის საერთაშორისო პრომოციის პროგრამა. პროგრამა მოიცავს ქართული წიგნების თარგმნას და საერთაშორისო ბაზრებზე გამოცემას.</p><p>პროგრამაში მონაწილეობას მიიღებს 100 ქართული ავტორი.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '00000000000006b90000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-04 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  8 => 
  array (
    'title' => 'კულტურული ღონისძიებების კალენდარი',
    'content' => '<p>გამოქვეყნდა 2025 წლის კულტურული ღონისძიებების კალენდარი. კალენდარი მოიცავს 200-ზე მეტ ღონისძიებას მთელი საქართველოს მასშტაბით.</p><p>ყველა ღონისძიება უფასო იქნება ხალხისთვის.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '00000000000007e60000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-03 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  9 => 
  array (
    'title' => 'ახალგაზრდა მუსიკოსთა კონკურსი',
    'content' => '<p>დაიწყება ახალგაზრდა მუსიკოსთა საერთაშორისო კონკურსი. კონკურსში მონაწილეობას მიიღებს 150 მუსიკოსი 25 ქვეყნიდან.</p><p>გამარჯვებული მიიღებს 50,000 ლარის პრიზს.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '00000000000009470000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-02 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  10 => 
  array (
    'title' => 'სპორტული მიღწევების ცერემონია',
    'content' => '<p>გაიმართება სპორტული მიღწევების ყოველწლიური ცერემონია. ცერემონიაზე დაჯილდოვდება საქართველოს საუკეთესო სპორტსმენები.</p><p>ცერემონია გაიმართება თბილისის სახელმწიფო ფილარმონიაში.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '0000000000000b830000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-07-01 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  11 => 
  array (
    'title' => 'კულტურული მემკვიდრეობის დაცვა',
    'content' => '<p>დაიწყება კულტურული მემკვიდრეობის დაცვის ახალი პროგრამა. პროგრამა მოიცავს ისტორიული ძეგლების რესტავრაციას და კონსერვაციას.</p><p>პროგრამაში ჩართული იქნება 50 ისტორიული ძეგლი.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '0000000000000b8c0000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-06-30 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  12 => 
  array (
    'title' => 'ახალგაზრდა მწერლების ფესტივალი',
    'content' => '<p>თბილისში გაიმართება ახალგაზრდა მწერლების საერთაშორისო ფესტივალი. ფესტივალში მონაწილეობას მიიღებს 100 მწერალი 30 ქვეყნიდან.</p><p>ფესტივალი მიზნად ისახავს ლიტერატურული ნაწარმოებების პოპულარიზაციას.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '0000000000000a510000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-06-29 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  13 => 
  array (
    'title' => 'სპორტული მედიის განვითარება',
    'content' => '<p>დაიწყება სპორტული მედიის განვითარების პროგრამა. პროგრამა მოიცავს ახალგაზრდა ჟურნალისტების ტრენინგს და სპორტული კონტენტის შექმნას.</p><p>პროგრამაში მონაწილეობას მიიღებს 25 ჟურნალისტი.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '000000000000094a0000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-06-28 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  14 => 
  array (
    'title' => 'კულტურული ტურიზმის პრომოცია',
    'content' => '<p>დაიწყება კულტურული ტურიზმის საერთაშორისო პრომოციის კამპანია. კამპანია მოიცავს საქართველოს კულტურული ღირსშესანიშნაობების პოპულარიზაციას.</p><p>კამპანია მიმართული იქნება 20 ქვეყნის ტურისტებზე.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '0000000000000b660000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-06-27 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
  15 => 
  array (
    'title' => 'ახალგაზრდა მოცეკვავეთა კონკურსი',
    'content' => '<p>დაიწყება ახალგაზრდა მოცეკვავეთა საერთაშორისო კონკურსი. კონკურსში მონაწილეობას მიიღებს 200 მოცეკვავე 40 ქვეყნიდან.</p><p>გამარჯვებული მიიღებს 30,000 ლარის პრიზს.</p>',
    'image' => NULL,
    'attachments' => NULL,
    'is_published' => true,
    'published_at' => 
    \Illuminate\Support\Carbon::__set_state(array(
       'endOfTime' => false,
       'startOfTime' => false,
       'constructedObjectId' => '00000000000008270000000000000000',
       'clock' => NULL,
       'localMonthsOverflow' => NULL,
       'localYearsOverflow' => NULL,
       'localStrictModeEnabled' => NULL,
       'localHumanDiffOptions' => NULL,
       'localToStringFormat' => NULL,
       'localSerializer' => NULL,
       'localMacros' => NULL,
       'localGenericMacros' => NULL,
       'localFormatFunction' => NULL,
       'localTranslator' => NULL,
       'dumpProperties' => 
      array (
        0 => 'date',
        1 => 'timezone_type',
        2 => 'timezone',
      ),
       'dumpLocale' => NULL,
       'dumpDateProperties' => NULL,
       'date' => '2025-06-26 11:24:15.000000',
       'timezone_type' => 3,
       'timezone' => 'UTC',
    )),
  ),
);

        foreach ($news as $newsData) {
            News::create($newsData);
        }

        $this->command->info('News seeded with current database data!');
    }
}