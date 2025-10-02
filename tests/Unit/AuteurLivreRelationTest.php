<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Auteur;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuteurLivreRelationTest extends TestCase
{
    use RefreshDatabase;

    public function test_auteur_has_livres()
    {
        $auteur = Auteur::factory()->create();
        
        $livre1 = $auteur->livres()->create([
            'titre' => 'Les Misérables',
            'date_publication' => '1862-01-01'
        ]);
        
        $livre2 = $auteur->livres()->create([
            'titre' => 'Notre-Dame de Paris',
            'date_publication' => '1831-01-01'
        ]);

        $this->assertCount(2, $auteur->livres);
        $this->assertEquals('Les Misérables', $auteur->livres[0]->titre);
    }

    public function test_auteurs_avec_plusieurs_livres_1800_1900()
    {
        $auteur1 = Auteur::factory()->create();
        $auteur1->livres()->createMany([
            ['titre' => 'Livre1', 'date_publication' => '1820-01-01'],
            ['titre' => 'Livre2', 'date_publication' => '1850-01-01'],
        ]);

        $auteur2 = Auteur::factory()->create();
        $auteur2->livres()->create([
            'titre' => 'Livre3',
            'date_publication' => '1870-01-01'
        ]);

        $auteurs = Auteur::whereHas('livres', function($q) {
            $q->whereBetween('date_publication', ['1800-01-01','1900-12-31']);
        }, '>=', 2)->get();

        $this->assertTrue($auteurs->contains($auteur1));
        $this->assertFalse($auteurs->contains($auteur2));
    }
}
