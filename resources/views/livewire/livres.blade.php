<div>
    <h2>Liste des livres</h2>
    
    <h3>Filtrer par catégorie</h3>
    <select wire:model="categorieId">
        <option value="">-- Toutes les catégories --</option>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
        @endforeach
    </select>
    
    @if($livres->count() > 0)
        <p>Nombre de livres : {{ $livres->count() }}</p>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Date de publication</th>
                    <th>Prix</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                    <tr>
                        <td>{{ $livre->id }}</td>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->date_publication }}</td>
                        <td>{{ $livre->prix }} €</td>
                        <td>{{ $livre->auteur->nom ?? 'Non défini' }}</td>
                        <td>{{ $livre->categorie->nom ?? 'Non définie' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun livre trouvé.</p>
    @endif
</div>
