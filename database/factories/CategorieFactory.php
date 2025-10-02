<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'intitule' => $this->faker->randomElement(['Roman', 'Science-Fiction', 'Fantasy', 'Thriller', 'Policier', 'Biographie', 'Histoire', 'Philosophie', 'Sciences', 'Art']),
            'description' => $this->faker->paragraph(),
        ];
    }
}
