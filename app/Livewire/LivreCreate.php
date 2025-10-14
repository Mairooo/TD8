<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;
use App\Models\Auteur;

class LivreCreate extends Component
{
    public $titre = '';
    public $date_publication = '';
    public $auteur_id = '';
    public $selectedAuteurs = [];

    protected $rules = [
        'titre' => 'required|min:3',
        'date_publication' => 'required|date',
        'auteur_id' => 'required|exists:auteurs,id',
    ];

    protected $messages = [
        'titre.required' => 'Le titre est obligatoire.',
        'titre.min' => 'Le titre doit contenir au moins 3 caractères.',
        'date_publication.required' => 'La date de publication est obligatoire.',
        'date_publication.date' => 'La date doit être valide.',
        'auteur_id.required' => 'Veuillez sélectionner un auteur.',
    ];

    public function save()
    {
        $this->validate();

        $livre = Livre::create([
            'titre' => $this->titre,
            'date_publication' => $this->date_publication,
            'auteur_id' => $this->auteur_id,
        ]);

        session()->flash('message', 'Livre créé avec succès !');
        
        // Reset form
        $this->reset(['titre', 'date_publication', 'auteur_id']);
        
        return redirect()->route('catalogue.livres');
    }

    public function render()
    {
        $auteurs = Auteur::orderBy('name')->get();
        return view('livewire.livre-create', [
            'auteurs' => $auteurs
        ]);
    }
}
