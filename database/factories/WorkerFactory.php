<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('ru_RU')->firstName,
            'surname' => fake('ru_RU')->lastName,
            'email' => fake()->unique()->safeEmail(),
            'age' => fake()->numberBetween(17, 55),
            'description' => fake('ru_RU')->realText(200),
            'is_married' => fake()->boolean,
            'position_id' => Position::inRandomOrder()->first()->id,


        ];
    }
}
