<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Skenario 1: Membuat 10 Post acak (otomatis membuat 10 User baru juga)
        // Post::factory(10)->create();

        // Skenario 2 (Lebih Realistis): Membuat 1 User spesifik yang memiliki 10 Post
        $user = User::factory()->create([
            'name'  => 'Admin FORNEWS',
            'email' => 'admin@fornews.test',
        ]);

        Post::factory(100)->create([
            'user_id' => $user->id,
        ]);
    }
}