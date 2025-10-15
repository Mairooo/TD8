<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;
use App\Models\Auteur;

class LivreEdit extends Component
{
    public $livreId;
    public $titre = '';
    public $date_publication = '';
    public $auteur_id = '';

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

    public function mount($id)
    {
        $this->livreId = $id;
        $livre = Livre::findOrFail($id);
        
        $this->titre = $livre->titre;
        $this->date_publication = $livre->date_publication;
        $this->auteur_id = $livre->auteur_id;
    }

    public function save()
    {
        $this->validate();

        $livre = Livre::findOrFail($this->livreId);
        $livre->update([
            'titre' => $this->titre,
            'date_publication' => $this->date_publication,
            'auteur_id' => $this->auteur_id,
        ]);

        session()->flash('message', 'Livre modifié avec succès !');
        return redirect()->route('catalogue.livres');
    }

    public function delete()
    {
        $livre = Livre::findOrFail($this->livreId);
        $livre->delete();

        session()->flash('message', 'Livre supprimé avec succès !');
        return redirect()->route('catalogue.livres');
    }

    public function render()
    {
        $auteurs = Auteur::orderBy('name')->get();
        $livre = Livre::findOrFail($this->livreId);
        
        return view('livewire.livre-edit', [
            'auteurs' => $auteurs,
            'livre' => $livre
        ]);
    }
}
