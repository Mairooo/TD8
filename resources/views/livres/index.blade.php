<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
</head>
<body>
    <h1>Liste des Livres</h1>
    
    <p>Nombre de livres : {{ $livres->total() }} (Page {{ $livres->currentPage() }} sur {{ $livres->lastPage() }})</p>
    
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
        
        <!-- Liens de pagination simples -->
        <div style="margin: 20px 0;">
            <p><strong>Navigation :</strong></p>
            
            @if ($livres->onFirstPage())
                <span>« Précédent</span>
            @else
                <a href="{{ $livres->previousPageUrl() }}">« Précédent</a>
            @endif
            
            |
            
            @for ($i = 1; $i <= $livres->lastPage(); $i++)
                @if ($i == $livres->currentPage())
                    <strong>{{ $i }}</strong>
                @else
                    <a href="{{ $livres->url($i) }}">{{ $i }}</a>
                @endif
                @if ($i < $livres->lastPage()) | @endif
            @endfor
            
            |
            
            @if ($livres->hasMorePages())
                <a href="{{ $livres->nextPageUrl() }}">Suivant »</a>
            @else
                <span>Suivant »</span>
            @endif
        </div>
    @else
        <p>Aucun livre trouvé.</p>
    @endif
    
    <br>
    <a href="/">Retour à l'accueil</a>
</body>
</html>
