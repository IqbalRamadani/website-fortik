<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Pastikan folder penyimpanan tujuan sudah ada, jika belum, buatkan.
        $targetDirectory = storage_path('app/public/struktur-images');
        if (!File::exists($targetDirectory)) {
            File::makeDirectory($targetDirectory, 0755, true);
        }

        // 2. Lokasi gambar dummy yang sudah kamu siapkan di folder public
        $sourceImage = public_path('images/default-avatar.webp'); 
        
        // 3. Hierarki absolut organisasi (Sesuaikan dengan nama divisi di FORTIK)
        $strukturFortik = [
            'BADAN PENGURUS HARIAN (BPH)' => [
                'Ketua Umum', 
                'Wakil Ketua', 
                'Sekretaris', 
                'Bendahara'
            ],
            'DIVISI DESAIN GRAFIS' => [
                'Ketua Divisi Desain Grafis', 
                'Anggota Desain Grafis 1', 
                'Anggota Desain Grafis 2',
                'Anggota Desain Grafis 3', 
                'Anggota Desain Grafis   4'
            ],
            'DIVISI VIDEOGRAFI' => [
                'Ketua Divisi Video', 
                'Anggota Video 1', 
                'Anggota Video 2',
                'Anggota Video 3', 
                'Anggota Video 4'
            ],
            'DIVISI CONTENT CREATOR' => [
                'Ketua Divisi Content Creator', 
                'Anggota Content Creator 1', 
                'Anggota Content Creator 2',
                'Anggota Content Creator 3', 
                'Anggota Content Creator 4'
            ],
            'DIVISI PENGEMBANGAN SUMBER DAYA MANUSIA (PSDM)' => [
                'Ketua Divisi PSDM', 
                'Anggota PSDM 1', 
                'Anggota PSDM 2',
                'Anggota PSDM 3', 
                'Anggota PSDM 4'
            ],
            'DIVISI PUBLIC RELATION' => [
                'Ketua Divisi Public Relation', 
                'Anggota Public Relation 1', 
                'Anggota Public Relation 2',
                'Anggota Public Relation 3', 
                'Anggota Public Relation 4'
            ],
            'DIVISI SISTEM INFORMASI INFRASTRUKTUR PROGRAMMING (SIIP)' => [
                'Ketua Divisi SIIP', 
                'Anggota SIIP 1', 
                'Anggota SIIP 2',
                'Anggota SIIP 3', 
                'Anggota SIIP 4'
            ],
        ];

        $divisionOrder = 1;

        foreach ($strukturFortik as $divisionName => $members) {
            // Buat Divisi
            $division = Division::create([
                'name' => $divisionName,
                'sort_order' => $divisionOrder++
            ]);

            $memberOrder = 1;

            foreach ($members as $memberName) {
                // Buat nama file unik untuk seolah-olah ini adalah hasil upload Filament
                $filename = 'struktur-images/dummy-' . Str::random(10) . '.webp';
                
                // Gandakan file gambar fisik ke folder storage
                if (File::exists($sourceImage)) {
                    File::copy($sourceImage, storage_path('app/public/' . $filename));
                }

                // Masukkan data ke database
                Member::create([
                    'division_id' => $division->id,
                    'name' => $memberName,
                    'image' => $filename,
                    'sort_order' => $memberOrder++
                ]);
            }
        }
    }
}
