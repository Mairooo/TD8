<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;
use App\Models\Auteur;

class LibraireCreateBook extends Component
{
    public $titre = '';
    public $isbn = '';
    public $annee_publication = '';
    public $auteur_id = '';

    protected $rules = [
        'titre' => 'required|min:3',
        'isbn' => 'required|unique:livres',
        'annee_publication' => 'required|integer|min:1900|max:' . 2025,
        'auteur_id' => 'required|exists:auteurs,id',
    ];

    public function save()
    {
        $this->validate();

        Livre::create([
            'titre' => $this->titre,
            'isbn' => $this->isbn,
            'annee_publication' => $this->annee_publication,
            'auteur_id' => $this->auteur_id,
        ]);

        session()->flash('message', 'Livre créé avec succès.');
        return redirect()->route('catalogue.livres');
    }

    public function render()
    {
        $auteurs = Auteur::all();
        return view('livewire.libraire-create-book', ['auteurs' => $auteurs]);
    }
}
