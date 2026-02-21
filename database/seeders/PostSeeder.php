<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User; 

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Mengatasi blind spot relasi: Pastikan minimal ada 1 user di database
        $userId = User::first()->id ?? User::factory()->create()->id;

        $posts = [];
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(5);
            $posts[] = [
                'title'        => $title,
                'slug'         => Str::slug($title) . '-' . Str::random(5), // Mencegah duplikasi slug
                'user_id'      => $userId,
                'published_at' => $faker->optional()->date(),
                'content'      => $faker->paragraphs(4, true),
                'image'        => null,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
