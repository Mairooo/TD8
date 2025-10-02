<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auteur;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Auteur::firstOrCreate(
            ['mail' => 'victorhugo@rip.fr'], // Critère de recherche
            [
                'name' => 'Victor Hugo',
                'date_naissance' => '1802-02-26',
                'mail' => 'victorhugo@rip.fr'
            ]
        );

        Auteur::firstOrCreate(
            ['mail' => 'julesverne@rip.fr'], // Critère de recherche
            [
                'name' => 'Jules Verne',
                'date_naissance' => '1828-02-08',
                'mail' => 'julesverne@rip.fr'
            ]
        );

        // Exemple : générer 5 auteurs fictifs avec la factory
        \App\Models\Auteur::factory()->count(5)->create();
    }
}
