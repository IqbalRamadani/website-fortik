<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'question' => 'Apa itu FORTIK dan apa fokus utamanya?',
                'answer' => 'FORTIK adalah Unit Kegiatan Mahasiswa (UKM) yang berfokus pada pengembangan teknologi, namun juga mencakup pengembangan sumber daya manusia dan komunikasi publik melalui berbagai divisi internal.'
            ],
            [
                'question' => 'Kapan pendaftaran anggota baru (Open Recruitment) dibuka?',
                'answer' => 'Open recruitment diadakan secara rutin setiap awal semester ganjil, tepatnya beberapa hari setelah hari pertama perkuliahan dimulai.'
            ],
            [
                'question' => 'Apa saja divisi yang ada di dalam FORTIK?',
                'answer' => 'Terdapat enam divisi utama: Desain Grafis, Videografi, Content Creator, SIIP (Sistem Informasi Infrastruktur dan Programming), PSDM (Pengembangan Sumber Daya Manusia) dan Public Relation.'
            ],
            [
                'question' => 'Apa acara terbesar yang diselenggarakan oleh FORTIK?',
                'answer' => 'Acara puncak kami adalah Fortik\'s Fair, sebuah festival teknologi berskala nasional yang mencakup perlombaan, pelatihan, dan webinar nasional.'
            ],
        ];

        $order = 1;
        foreach ($items as $item) {
            Faq::updateOrCreate([
                'question' => $item['question'],
            ], [
                'answer' => $item['answer'],
                'sort_order' => $order++
            ]);
        }
    }
}
