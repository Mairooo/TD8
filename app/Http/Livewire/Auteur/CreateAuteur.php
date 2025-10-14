<?php

namespace App\Http\Livewire\Auteur;

use Livewire\Component;

class CreateAuteur extends Component
{
    public $nom;
    public $date_naissance;
    public $continent;
    public $mail;

    protected $rules = [
        'nom' => 'required|string',
        'date_naissance' => 'required|date',
        'continent' => 'required|string',
        'mail' => 'required|email',
    ];

    public function save()
    {
        // Valider les données fournies par l'utilisateur
        $this->validate();

        // Débogage : Vérifier la valeur de $nom
        if (empty($this->nom)) {
            session()->flash('error', 'Le champ nom est vide.');
            return;
        }

        // Créer un nouvel auteur et l'enregistrer en base
        \App\Models\Auteur::create([
            'nom' => $this->nom,
            'date_naissance' => $this->date_naissance,
            'continent' => $this->continent,
            'mail' => $this->mail,
        ]);

        // Reset du formulaire
        $this->reset(['nom', 'date_naissance', 'continent', 'mail']);

        // Optionnel : Ajouter un message de succès
        session()->flash('message', 'Auteur ajouté avec succès !');
    }

    public function render()
    {
        return view('livewire.auteur.create-auteur');
    }
}
