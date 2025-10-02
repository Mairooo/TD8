<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auteur>
 */
class AuteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'date_naissance' => $this->faker->date(),
            'mail' => $this->faker->unique()->safeEmail(),
            'continent' => $this->faker->randomElement(['Europe', 'Amérique', 'Asie', 'Afrique', 'Océanie']),
        ];
    }
}
