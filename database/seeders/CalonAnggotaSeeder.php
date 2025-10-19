<?php

namespace Database\Seeders;

use App\Models\CalonAnggota;
use Illuminate\Database\Seeder;

class CalonAnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nim' => '2024033385',
                'nama_lengkap' => 'Akhmad Dzaqi Mustofa',
                'divisi' => 'Sekretaris',
                'status' => 'LULUS'
            ],
            [
                'nim' => '2025384446',
                'nama_lengkap' => 'Abdullah Umeir',
                'divisi' => 'Divisi Desain Grafis',
                'status' => 'LULUS'
            ],
            [
                'nim' => '2025334452',
                'nama_lengkap' => 'Muhammad Almer Saskara Khansa Faiz Maulana',
                'divisi' => 'Divisi Desain Grafis',
                'status' => 'LULUS'
            ],
            [
                'nim' => '2025033896',
                'nama_lengkap' => 'MUHAMMAD DZAKY ASSYAM',
                'divisi' => 'Divisi Desain Grafis',
                'status' => 'LULUS'
            ],
            [
                'nim' => '2025333840',
                'nama_lengkap' => 'Rizal Ahmad Setiawan',
                'divisi' => 'Divisi Desain Grafis',
                'status' => 'LULUS'
            ]
        ];

        foreach ($data as $item) {
            CalonAnggota::create($item);
        }
    }
}
