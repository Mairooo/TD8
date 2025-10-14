<?php

namespace App\Livewire\Auteur;

use Livewire\Component;
use App\Models\Auteur;

class ListeAuteurs extends Component
{
    public $continent = "";

    public function render()
    {
        if ($this->continent !== "") {
            $auteurs = Auteur::where("continent", $this->continent)
                ->get();
        } else {
            $auteurs = Auteur::all();
        }
        
        return view("livewire.auteur.liste-auteurs", ["auteurs" => $auteurs]);
    }
}
