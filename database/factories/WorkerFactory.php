<?php

namespace Database\Factories;

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
            'name' => fake('ru_RU')->firstName(),
            'position_id' => Position::inRandomOrder()->first()->id,

            'surname' => fake('ru_RU')->lastName(),
            'email' => fake('ru_RU')->unique()->email(),
            'age' => fake('ru_RU')->numberBetween(15, 55),
            'description' => fake('ru_RU')->realText(),


        ];
    }
}
