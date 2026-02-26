<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'question' => 'Apa itu FORTIK?',
                'answer' => 'FORTIK adalah singkatan dari Forum Teknologi Informasi dan Komunikasi. Forum ini dibentuk untuk menjadi wadah mahasiswa yang memiliki minat dan bakat di bidang teknologi. FORTIK berdiri pada tanggal 10 Oktober 2022 di Sekolah Tinggi Dirasat Islamiyyah Imam Syafi\'i (STDIIS) Jember, Jawa Timur.'
            ],
            [
                'question' => 'Kapan FORTIK membuka pendaftaran anggota baru?',
                'answer' => 'Kabar gembira nih! FORTIK Insya Allah bakal buka pendaftaran tanggal 1-7 September!! Siap siap yaa!'
            ],
            [
                'question' => 'FORTIK itu ngapain sih?',
                'answer' => 'FORTIK adalah UKM yang berfokus pada teknologi informasi, kerjaannya? tentu berkaitan dengan Teknologi Informasi dong.'
            ],
            [
                'question' => 'Apa keuntungan masuk FORTIK?',
                'answer' => 'Kamu bakal dapet relasi yang solid, pengalaman berorganisasi, skill yang terarah dan terasah, dan tentunya SAKTIFA dong.'
            ],
        ];

        $order = 1;
        foreach ($items as $item) {
            Faq::create([
                'question' => $item['question'],
                'answer' => $item['answer'],
                'sort_order' => $order++
            ]);
        }
    }
}
