<?php

namespace App\Livewire\Auteur;

use Livewire\Component;

class CreateAuteur extends Component
{
    public $name;
    public $date_naissance;
    public $continent;
    public $mail;

    protected $rules = [
        'name' => 'required|string',
        'date_naissance' => 'required|date',
        'continent' => 'required|string',
        'mail' => 'required|email',
    ];

    public function save()
    {
        // Valider les données fournies par l'utilisateur
        $this->validate();

        // Créer un nouvel auteur et l'enregistrer en base
        \App\Models\Auteur::create([
            'name' => $this->name,
            'date_naissance' => $this->date_naissance,
            'continent' => $this->continent,
            'mail' => $this->mail,
        ]);

        // Reset du formulaire
        $this->reset(['name', 'date_naissance', 'continent', 'mail']);

        // Optionnel : Ajouter un message de succès
        session()->flash('message', 'Auteur ajouté avec succès !');
    }

    public function render()
    {
        return view('livewire.auteur.create-auteur');
    }
}
