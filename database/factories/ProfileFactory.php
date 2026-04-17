<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worker_id' => Worker::factory()->create(),
            'city' => fake('ru_RU')->city,
            'skill' => fake('ru_RU')->jobTitle,
            'experience' => fake()->numberBetween(1,5),
            'finished_study_at' => fake()->date('Y-m-d'),
        ];
    }
}
