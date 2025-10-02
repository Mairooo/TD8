<?php

namespace Database\Factories;

use App\Models\Auteur;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(3), // Titre de livre (3 mots)
            'date_publication' => $this->faker->date(),
            'auteur_id' => Auteur::factory(), // Crée automatiquement un auteur ou utilise un existant
            'categorie_id' => Categorie::factory(), // Crée automatiquement une catégorie
        ];
    }
}
