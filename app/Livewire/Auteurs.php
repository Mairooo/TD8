<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Auteur;

class Auteurs extends Component
{
    public $continent = ''; // continent sélectionné

    public function render()
    {
        if ($this->continent !== '') {
            $auteurs = Auteur::where('continent', $this->continent)->get();
        } else {
            $auteurs = Auteur::all();
        }

        return view('livewire.auteurs', [
            'auteurs' => $auteurs,
        ]);
    }
}
