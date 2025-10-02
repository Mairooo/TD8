<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Auteur;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuteurTest extends TestCase
{
    use RefreshDatabase;

    public function test_creation_auteur()
    {
        // Création de l'auteur Victor Hugo
        $auteur = Auteur::create([
            'name' => 'Victor Hugo',
            'date_naissance' => '1802-02-26',
            'mail' => 'victorhugo@rip.fr'
        ]);

        // Vérifier que l'auteur Victor Hugo nouvellement créé
        // existe dans la base
        $this->assertDatabaseHas('auteurs', [
            'name' => 'Victor Hugo'
        ]);
    }

    public function test_creation_auteur_avec_date_invalide()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        // Tentative de création avec une date invalide
        $auteur = Auteur::create([
            'name' => 'Test Auteur',
            'date_naissance' => 'date-invalide',
            'mail' => 'test@example.com'
        ]);
    }

    // Test unitaire pour la validation de l'email
    public function test_creation_auteur_avec_email_invalide()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        // Tentative de création avec un email invalide
        $auteur = Auteur::create([
            'name' => 'Test Auteur',
            'date_naissance' => '1990-01-01',
            'mail' => 'email-invalide'
        ]);
    }

    public function test_auteur_factory_genere_donnees_valides()
    {
        $auteur = Auteur::factory()->create();
        
        // Vérifier que la factory génère des données valides
        $this->assertNotEmpty($auteur->name);
        $this->assertNotEmpty($auteur->date_naissance);
        $this->assertNotEmpty($auteur->mail);
        $this->assertTrue(filter_var($auteur->mail, FILTER_VALIDATE_EMAIL) !== false);
    }
}

