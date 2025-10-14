<div>
    <h2>Filtrer les auteurs par continent</h2>
    <select wire:model.live="continent">
        <option value="">-- Tous les continents --</option>
        <option value="Europe">Europe</option>
        <option value="Asie">Asie</option>
        <option value="Afrique">Afrique</option>
        <option value="Amerique du Nord">Amerique du Nord</option>
        <option value="Oceanie">Oceanie</option>
    </select>

    <h3>Liste des auteurs</h3>
    
    <div>
        @forelse($auteurs as $auteur)
            <div>
                {{ $auteur->name }} ({{ $auteur->continent }})
            </div>
        @empty
            Aucun auteur trouvé
        @endforelse
    </div>
</div>
