<?php

namespace Database\Seeders;

use App\Models\Bulletin;
use App\Models\User;
use Illuminate\Database\Seeder;

class BulletinSeeder extends Seeder
{
    public function run(): void
    {
        // Skenario 1: Membuat 10 Bulletin acak (otomatis membuat 10 User baru juga)
        // Bulletin::factory(10)->create();

        // Skenario 2 (Lebih Realistis): Membuat 1 User spesifik yang memiliki 10 Bulletin
        $user = User::factory()->create([
            'name'  => 'Admin FORSIGHT',
            'email' => 'admin@forsight.test',
            'password' => bcrypt('password'), // Pastikan password terenkripsi
        ]);

        Bulletin::factory(100)->create([
            'user_id' => $user->id,
        ]);
    }
}
