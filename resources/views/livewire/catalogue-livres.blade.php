<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Catalogue des Livres</h1>
                @if(auth()->user()->canManageBooks())
                    <a href="{{ route('livres.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter un livre
                    </a>
                @endif
            </div>

            <!-- Barre de recherche -->
            <div class="mb-6">
                <input wire:model.live="search" 
                       type="text" 
                       placeholder="Rechercher par titre ou auteur..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Liste des livres -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($livres as $livre)
                    <div class="bg-gray-50 rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $livre->titre }}</h3>
                        <p class="text-gray-600 mb-2">
                            <span class="font-medium">Auteur:</span> {{ $livre->auteur->name ?? 'Non spécifié' }}
                        </p>
                        <p class="text-gray-600 mb-4">
                            <span class="font-medium">Date de publication:</span> {{ $livre->date_publication ? \Carbon\Carbon::parse($livre->date_publication)->format('d/m/Y') : 'Non spécifiée' }}
                        </p>
                        
                        @if(auth()->user()->canManageBooks())
                            <div class="flex space-x-2">
                                <a href="{{ route('livres.edit', $livre->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm">
                                    Modifier
                                </a>
                                <button wire:click="$dispatch('delete-livre', { id: {{ $livre->id }} })"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">
                                    Supprimer
                                </button>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 text-lg">Aucun livre trouvé.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $livres->links() }}
            </div>
        </div>
    </div>
</div>
