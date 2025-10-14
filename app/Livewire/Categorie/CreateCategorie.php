<?php

namespace App\Livewire\Categorie;

use Livewire\Component;
use App\Models\Categorie;

class CreateCategorie extends Component
{
    public $intitule;

    protected $rules = [
        'intitule' => 'required|string|max:255',
    ];

    public function save()
    {
        // Valider les données fournies par l'utilisateur
        $this->validate();

        // Créer une nouvelle catégorie et l'enregistrer en base
        Categorie::create([
            'intitule' => $this->intitule,
        ]);

        // Reset du formulaire
        $this->reset(['intitule']);

        // Ajouter un message de succès
        session()->flash('message', 'Catégorie ajoutée avec succès !');
    }

    public function render()
    {
        return view('livewire.categorie.create-categorie');
    }
}
