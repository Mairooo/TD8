<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Ajouter un nouveau livre</h1>
                <a href="{{ route('catalogue.livres') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Retour au catalogue
                </a>
            </div>

            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Titre -->
                <div>
                    <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">
                        Titre du livre <span class="text-red-500">*</span>
                    </label>
                    <input wire:model="titre" 
                           type="text" 
                           id="titre" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Entrez le titre du livre">
                    @error('titre') 
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Date de publication -->
                <div>
                    <label for="date_publication" class="block text-sm font-medium text-gray-700 mb-2">
                        Date de publication <span class="text-red-500">*</span>
                    </label>
                    <input wire:model="date_publication" 
                           type="date" 
                           id="date_publication" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('date_publication') 
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Auteur -->
                <div>
                    <label for="auteur_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Auteur <span class="text-red-500">*</span>
                    </label>
                    <select wire:model="auteur_id" 
                            id="auteur_id" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Sélectionner un auteur</option>
                        @foreach($auteurs as $auteur)
                            <option value="{{ $auteur->id }}">{{ $auteur->name }}</option>
                        @endforeach
                    </select>
                    @error('auteur_id') 
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Boutons -->
                <div class="flex items-center justify-end space-x-4 pt-6">
                    <a href="{{ route('catalogue.livres') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                        Annuler
                    </a>
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                        Créer le livre
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
