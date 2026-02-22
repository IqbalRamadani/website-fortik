<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::factory(8)->create()->each(function ($album) {
        for ($i = 0; $i < rand(5, 12); $i++) {
            Photo::create([
                'album_id' => $album->id,
                'image_path' => 'https://picsum.photos/200.webp?random=' . rand(1, 100),
            ]);
        }
    });
    }
}
