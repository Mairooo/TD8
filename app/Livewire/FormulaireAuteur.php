<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Auteur;

class FormulaireAuteur extends Component
{
    public $name;
    public $date_naissance;
    public $continent;

    protected $rules = [
        'name' => 'required|string|max:255',
        'date_naissance' => 'required|date',
        'continent' => 'required|in:Amerique du Nord,Amerique du Sud,Asie,Afrique,Europe,Oceanie',
    ];

    // La fonction ajouter() s'exécute lorsque l'utilisateur clique sur le
    // bouton Ajouter un nouveau auteur
    public function ajouter()
    {
        $this->validate();

        // Enregistrer le nouvel auteur dans la base de données
        $auteur = Auteur::create([
            'name' => $this->name,
            'date_naissance' => $this->date_naissance,
            'continent' => $this->continent,
        ]);

        // Communique l'information qu'un nouveau auteur a été créé au
        // composant principal
        $this->dispatch('auteurAjoute', $auteur->toArray());

        $this->name = '';
        $this->date_naissance = '';
        $this->continent = '';
    }

    public function render()
    {
        return view('livewire.formulaire-auteur');
    }
}
