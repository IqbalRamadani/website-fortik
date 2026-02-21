<?php

namespace Database\Factories;

use App\Models\Bulletin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BulletinFactory extends Factory
{
    protected $model = Bulletin::class;

    public function definition(): array
    {
        $title = fake()->sentence(5);

        return [
            'title'        => $title,
            'slug'         => Str::slug($title) . '-' . Str::random(5),
            // Blind spot teratasi: Jika factory dipanggil tanpa user_id, 
            // Laravel otomatis membuatkan User baru di background.
            'user_id'      => User::factory(), 
            'published_at' => fake()->optional()->date(),
            'content'      => fake()->paragraphs(4, true),
            'image'        => null,
        ];
    }
}