<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Gestion du catalogue - Livres</h1>
        <a href="{{ route('livres.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Ajouter un livre
        </a>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Titre</th>
                <th class="px-4 py-2 border">Auteur</th>
                <th class="px-4 py-2 border">ISBN</th>
                <th class="px-4 py-2 border">Année</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td class="border px-4 py-2">{{ $book->titre }}</td>
                <td class="border px-4 py-2">{{ $book->auteur->nom ?? 'N/A' }}</td>
                <td class="border px-4 py-2">{{ $book->isbn }}</td>
                <td class="border px-4 py-2">{{ $book->annee_publication }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('livres.edit', $book->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">
                        Modifier
                    </a>
                    <button wire:click="deleteBook({{ $book->id }})" 
                            wire:confirm="Êtes-vous sûr de vouloir supprimer ce livre ?"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                        Supprimer
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
