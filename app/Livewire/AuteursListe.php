<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Auteur;

class AuteursListe extends Component
{
    public $showForm = false; // contrôle l'affichage du formulaire
    public $auteurs;

    public function mount()
    {
        $this->auteurs = Auteur::all();
    }

    public function toggleForm()
    {
        $this->showForm = true;
    }

    // Recevoir l'événement du composant enfant
    #[On('auteurAjoute')]
    public function auteurAjoute($auteur)
    {
        $this->auteurs = Auteur::all();
        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.auteurs-liste');
    }
}
