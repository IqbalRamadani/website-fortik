<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Lomba Karya Tulis Tingkat ' . $this->faker->randomElement(['Nasional', 'Provinsi', 'Kampus']) . ' 2026',
            'level' => $this->faker->randomElement(['Nasional', 'Provinsi', 'Kampus']),
            'banner_image' => 'https://placehold.co/400x600/6B21A8/FFF?text=Banner+Lomba',
            'start_date' => now()->addDays(rand(1, 10)),
            'end_date' => now()->addDays(rand(11, 30)),
            'location' => $this->faker->randomElement(['Online', 'Offline - Jember']),
            'is_free' => true,
            'quota' => $this->faker->numberBetween(50, 200),
            'link_grup' => $this->faker->url(),
        ];
    }
}
