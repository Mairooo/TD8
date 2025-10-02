<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;
use App\Models\Categorie;

class Livres extends Component
{
    public $categorieId = ''; // catégorie sélectionnée

    public function render()
    {
        // Récupérer toutes les catégories pour le menu déroulant
        $categories = Categorie::all();

        // Filtrer les livres par catégorie si une catégorie est sélectionnée
        if ($this->categorieId !== '') {
            $livres = Livre::where('categorie_id', $this->categorieId)->get();
        } else {
            $livres = Livre::all();
        }

        return view('livewire.livres', [
            'livres' => $livres,
            'categories' => $categories,
        ]);
    }
}
