<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeputyMinister;

class DeputyMinisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeputyMinister::create([
            'first_name' => [
                'ka' => 'ბექა',
                'en' => 'Beka'
            ],
            'last_name' => [
                'ka' => 'დავითულანი',
                'en' => 'Davitulani'
            ],
            'description' => [
                'ka' => 'მინისტრის მოადგილე კულტურის სფეროში. პასუხისმგებელია კულტურული პოლიტიკის განვითარებაზე, ხელოვნების სფეროს მხარდაჭერაზე და კულტურული მემკვიდრეობის დაცვაზე.',
                'en' => 'Deputy Minister for Culture. Responsible for developing cultural policy, supporting the arts sector, and preserving cultural heritage.'
            ],
            'phone' => '+995 32 2 000 000',
            'email' => 'b.davitulani@culture.gov.ge',
            'facebook_url' => 'https://facebook.com/bekadavitulani',
            'linkedin_url' => 'https://linkedin.com/in/bekadavitulani',
            'is_active' => true,
        ]);

        DeputyMinister::create([
            'first_name' => [
                'ka' => 'გიორგი',
                'en' => 'Giorgi'
            ],
            'last_name' => [
                'ka' => 'მირცხულავა',
                'en' => 'Mirtskhulava'
            ],
            'description' => [
                'ka' => 'მინისტრის მოადგილე სპორტის სფეროში. პასუხისმგებელია სპორტული ინფრასტრუქტურის განვითარებაზე, სპორტული მოვლენების ორგანიზებაზე და სპორტული განათლების ხელშეწყობაზე.',
                'en' => 'Deputy Minister for Sports. Responsible for developing sports infrastructure, organizing sporting events, and promoting sports education.'
            ],
            'phone' => '+995 32 2 000 001',
            'email' => 'g.mirtskhulava@culture.gov.ge',
            'instagram_url' => 'https://instagram.com/gmirtskhulava',
            'youtube_url' => 'https://youtube.com/@gmirtskhulava',
            'is_active' => true,
        ]);

        DeputyMinister::create([
            'first_name' => [
                'ka' => 'ნინო',
                'en' => 'Nino'
            ],
            'last_name' => [
                'ka' => 'მაისურაძე',
                'en' => 'Maisuradze'
            ],
            'description' => [
                'ka' => 'მინისტრის მოადგილე სპორტის სფეროში. პასუხისმგებელია სპორტული ინფრასტრუქტურის განვითარებაზე და სპორტული მოვლენების ორგანიზებაზე.',
                'en' => 'Deputy Minister for Sports. Responsible for developing sports infrastructure and organizing sporting events.'
            ],
            'phone' => '+995 32 2 000 001',
            'email' => 'n.maisuradze@culture.gov.ge',
            'instagram_url' => 'https://instagram.com/nmaisuradze',
            'youtube_url' => 'https://youtube.com/@nmaisuradze',
            'telegram_url' => 'https://t.me/nmaisuradze',
            'is_active' => true,
        ]);
    }
}
