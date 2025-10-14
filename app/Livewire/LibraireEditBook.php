<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;
use App\Models\Auteur;

class LibraireEditBook extends Component
{
    public $bookId;
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

    public function mount($id)
    {
        $this->bookId = $id;
        $book = Livre::findOrFail($id);
        
        $this->titre = $book->titre;
        $this->isbn = $book->isbn;
        $this->annee_publication = $book->annee_publication;
        $this->auteur_id = $book->auteur_id;
    }

    public function save()
    {
        $this->validate();

        $book = Livre::findOrFail($this->bookId);
        $book->update([
            'titre' => $this->titre,
            'isbn' => $this->isbn,
            'annee_publication' => $this->annee_publication,
            'auteur_id' => $this->auteur_id,
        ]);

        session()->flash('message', 'Livre modifié avec succès.');
        return redirect()->route('catalogue.livres');
    }

    public function render()
    {
        $auteurs = Auteur::all();
        return view('livewire.libraire-edit-book', ['auteurs' => $auteurs]);
    }
}
