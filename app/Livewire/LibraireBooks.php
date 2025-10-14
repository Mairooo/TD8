<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;

class LibraireBooks extends Component
{
    public function deleteBook($bookId)
    {
        $book = Livre::find($bookId);
        if ($book) {
            $book->delete();
            session()->flash('message', 'Livre supprimé avec succès.');
        }
    }

    public function render()
    {
        $books = Livre::with('auteur')->get();
        return view('livewire.libraire-books', ['books' => $books]);
    }
}
