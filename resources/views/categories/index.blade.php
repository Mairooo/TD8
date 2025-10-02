<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
</head>
<body>
    <h1>Liste des Catégories</h1>
    
    <!-- Message de succès -->
    @if(session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    
    <p>
        <a href="/categories/create">+ Ajouter une nouvelle catégorie</a>
    </p>
    
    <p>Nombre de catégories : {{ $categories->count() }}</p>
    
    @if($categories->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Intitulé</th>
                    <th>Description</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->intitule }}</td>
                        <td>{{ $categorie->description ?? 'Pas de description' }}</td>
                        <td>{{ $categorie->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="/livres/categories?categorie={{ $categorie->id }}">Voir les livres</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune catégorie trouvée.</p>
    @endif
    
    <br>
    <a href="/">Retour à l'accueil</a> | 
    <a href="/livres">Voir les livres</a>
</body>
</html>
