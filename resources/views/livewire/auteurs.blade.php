<div>
    <h2>Filtrer les auteurs par continent</h2>
    
    <select wire:model="continent">
        <option value="">-- Tous les continents --</option>
        <option value="Europe">Europe</option>
        <option value="Asie">Asie</option>
        <option value="Afrique">Afrique</option>
        <option value="Amerique">Amérique</option>
        <option value="Oceanie">Océanie</option>
    </select>

    <h3>Liste des auteurs</h3>
    <ul>
        @forelse ($auteurs as $auteur)
            <li>{{ $auteur->name }} ({{ $auteur->continent }})</li>
        @empty
            <li>Aucun auteur trouvé</li>
        @endforelse
    </ul>
</div>