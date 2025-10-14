<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Bienvenue, {{ auth()->user()->name }} !</h1>
                <p class="text-gray-600 mb-8">Votre rôle : <span class="font-semibold text-blue-600">{{ ucfirst(auth()->user()->role) }}</span></p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Catalogue des livres - Accessible à tous -->
                    <div class="bg-blue-50 rounded-lg p-6 hover:bg-blue-100 transition-colors">
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Catalogue des Livres</h3>
                        <p class="text-blue-700 mb-4">Consulter la liste complète des livres disponibles.</p>
                        <a href="{{ route('catalogue.livres') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Voir le catalogue
                        </a>
                    </div>

                    @if(auth()->user()->canManageBooks())
                        <!-- Gestion des livres - Libraires et Admins -->
                        <div class="bg-green-50 rounded-lg p-6 hover:bg-green-100 transition-colors">
                            <h3 class="text-xl font-semibold text-green-900 mb-2">Gestion des Livres</h3>
                            <p class="text-green-700 mb-4">Ajouter, modifier ou supprimer des livres du catalogue.</p>
                            <a href="{{ route('livres.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Ajouter un livre
                            </a>
                        </div>
                    @endif

                    @if(auth()->user()->canManageUsers())
                        <!-- Administration - Admins uniquement -->
                        <div class="bg-red-50 rounded-lg p-6 hover:bg-red-100 transition-colors">
                            <h3 class="text-xl font-semibold text-red-900 mb-2">Administration</h3>
                            <p class="text-red-700 mb-4">Gérer les utilisateurs et leurs permissions.</p>
                            <a href="{{ route('admin.users') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Gérer les utilisateurs
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Statistiques rapides -->
                <div class="mt-8 border-t pt-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Statistiques</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 rounded p-4 text-center">
                            <div class="text-2xl font-bold text-gray-900">{{ \App\Models\Livre::count() }}</div>
                            <div class="text-gray-600">Livres au total</div>
                        </div>
                        <div class="bg-gray-50 rounded p-4 text-center">
                            <div class="text-2xl font-bold text-gray-900">{{ \App\Models\Auteur::count() }}</div>
                            <div class="text-gray-600">Auteurs</div>
                        </div>
                        @if(auth()->user()->isAdmin())
                            <div class="bg-gray-50 rounded p-4 text-center">
                                <div class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</div>
                                <div class="text-gray-600">Utilisateurs</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
