<div>
    <h2>Liste des auteurs</h2>
    <ul>
        @foreach ($auteurs as $auteur)
            <li>{{ $auteur->name }} ({{ $auteur->continent }}) - {{ $auteur->date_naissance }}</li>
        @endforeach
    </ul>
    
    <button wire:click="toggleForm">Ajouter un nouvel auteur</button>
    
    @if ($showForm)
        @livewire('formulaire-auteur')
    @endif
</div>
