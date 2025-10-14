<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter un nouveau livre</h1>

    <form wire:submit.prevent="save" class="max-w-md">
        <div class="mb-4">
            <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre:</label>
            <input wire:model="titre" type="text" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('titre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="isbn" class="block text-gray-700 text-sm font-bold mb-2">ISBN:</label>
            <input wire:model="isbn" type="text" id="isbn" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('isbn') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="annee_publication" class="block text-gray-700 text-sm font-bold mb-2">Année de publication:</label>
            <input wire:model="annee_publication" type="number" id="annee_publication" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('annee_publication') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="auteur_id" class="block text-gray-700 text-sm font-bold mb-2">Auteur:</label>
            <select wire:model="auteur_id" id="auteur_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Sélectionner un auteur</option>
                @foreach($auteurs as $auteur)
                    <option value="{{ $auteur->id }}">{{ $auteur->nom }}</option>
                @endforeach
            </select>
            @error('auteur_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Créer le livre
            </button>
            <a href="{{ route('libraire.books') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Annuler
            </a>
        </div>
    </form>
</div>
