<?php

namespace App\Livewire;

use App\Models\Livre;
use App\Models\Auteur;
use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';
    public $resultsLivres = [];
    public $resultsAuteurs = [];

    public function updatedQuery()
    {
        // Si le texte dans la barre de recherche excede 2 lettres, on met a jour les resultats
        if (strlen($this->query) > 2) {
            $this->resultsLivres = Livre::search($this->query)->get();
            $this->resultsAuteurs = Auteur::search($this->query)->get();
        } else {
            $this->resultsLivres = [];
            $this->resultsAuteurs = [];
        }
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
