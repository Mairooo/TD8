<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Livre;
use Livewire\WithPagination;

class CatalogueLivres extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $livres = Livre::with(['auteur'])
            ->when($this->search, function ($query) {
                $query->where('titre', 'like', '%' . $this->search . '%')
                      ->orWhereHas('auteur', function ($query) {
                          $query->where('name', 'like', '%' . $this->search . '%');
                      });
            })
            ->paginate(10);

        return view('livewire.catalogue-livres', [
            'livres' => $livres
        ]);
    }
}
