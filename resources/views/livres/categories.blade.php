<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livres - {{ $categorie->nom }}</title>
</head>
<body>
    <h1>Livres de la catégorie : {{ $categorie->nom }}</h1>
    
    @if($categorie->description)
        <p><em>{{ $categorie->description }}</em></p>
    @endif
    
    <p>Nombre de livres : {{ $livres->total() }} 
        @if($livres->total() > 10)
            (Page {{ $livres->currentPage() }} sur {{ $livres->lastPage() }})
        @endif
    </p>
    
    @if($livres->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date de publication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                    <tr>
                        <td><a href="/livres/{{ $livre->id }}">{{ $livre->titre }}</a></td>
                        <td>{{ $livre->auteur->name }}</td>
                        <td>{{ $livre->date_publication }}</td>
                        <td><a href="/livres/{{ $livre->id }}">Voir détails</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($livres->lastPage() > 1)
            <!-- Pagination simple -->
            <div style="margin: 20px 0;">
                <p><strong>Navigation :</strong></p>
                
                @if ($livres->onFirstPage())
                    <span>« Précédent</span>
                @else
                    <a href="{{ $livres->appends(['categorie' => $categorie->id])->previousPageUrl() }}">« Précédent</a>
                @endif
                
                |
                
                @for ($i = 1; $i <= $livres->lastPage(); $i++)
                    @if ($i == $livres->currentPage())
                        <strong>{{ $i }}</strong>
                    @else
                        <a href="{{ $livres->appends(['categorie' => $categorie->id])->url($i) }}">{{ $i }}</a>
                    @endif
                    @if ($i < $livres->lastPage()) | @endif
                @endfor
                
                |
                
                @if ($livres->hasMorePages())
                    <a href="{{ $livres->appends(['categorie' => $categorie->id])->nextPageUrl() }}">Suivant »</a>
                @else
                    <span>Suivant »</span>
                @endif
            </div>
        @endif
    @else
        <p>Aucun livre trouvé dans cette catégorie.</p>
    @endif
    
    <br>
    <a href="/categories">Retour aux catégories</a> | 
    <a href="/livres">Tous les livres</a> | 
    <a href="/">Retour à l'accueil</a>
</body>
</html>
