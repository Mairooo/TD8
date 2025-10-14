<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;
use App\Models\Auteur;

class LivreEdit extends Component
{
    public $livreId;
    public $titre = '';
    public $isbn = '';
    public $annee_publication = '';
    public $auteur_id = '';

    protected $rules = [
        'titre' => 'required|min:3',
        'isbn' => 'required',
        'annee_publication' => 'required|integer|min:1900|max:2025',
        'auteur_id' => 'required|exists:auteurs,id',
    ];

    protected $messages = [
        'titre.required' => 'Le titre est obligatoire.',
        'titre.min' => 'Le titre doit contenir au moins 3 caractères.',
        'isbn.required' => 'L\'ISBN est obligatoire.',
        'annee_publication.required' => 'L\'année de publication est obligatoire.',
        'annee_publication.integer' => 'L\'année doit être un nombre.',
        'annee_publication.min' => 'L\'année doit être supérieure à 1900.',
        'annee_publication.max' => 'L\'année ne peut pas être supérieure à 2025.',
        'auteur_id.required' => 'Veuillez sélectionner un auteur.',
    ];

    public function mount($id)
    {
        $this->livreId = $id;
        $livre = Livre::findOrFail($id);
        
        $this->titre = $livre->titre;
        $this->isbn = $livre->isbn;
        $this->annee_publication = $livre->annee_publication;
        $this->auteur_id = $livre->auteur_id;
    }

    public function save()
    {
        $this->validate();

        $livre = Livre::findOrFail($this->livreId);
        $livre->update([
            'titre' => $this->titre,
            'isbn' => $this->isbn,
            'annee_publication' => $this->annee_publication,
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
