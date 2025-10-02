<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $livre->titre }} - Détails du livre</title>
</head>
<body>
    <h1>Détails du livre</h1>
    
    <table border="1" style="margin: 20px 0;">
        <tr>
            <th style="text-align: left; padding: 10px;">ID</th>
            <td style="padding: 10px;">{{ $livre->id }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Titre</th>
            <td style="padding: 10px;"><strong>{{ $livre->titre }}</strong></td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Auteur</th>
            <td style="padding: 10px;">{{ $livre->auteur->name }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Date de publication</th>
            <td style="padding: 10px;">{{ $livre->date_publication }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Catégorie</th>
            <td style="padding: 10px;">
                @if($livre->categorie)
                    {{ $livre->categorie->nom }}
                    @if($livre->categorie->description)
                        <br><em>{{ $livre->categorie->description }}</em>
                    @endif
                @else
                    <em>Aucune catégorie</em>
                @endif
            </td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Date de création</th>
            <td style="padding: 10px;">{{ $livre->created_at->format('d/m/Y à H:i') }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Dernière modification</th>
            <td style="padding: 10px;">{{ $livre->updated_at->format('d/m/Y à H:i') }}</td>
        </tr>
    </table>

    <h2>Informations sur l'auteur</h2>
    <table border="1" style="margin: 20px 0;">
        <tr>
            <th style="text-align: left; padding: 10px;">Nom</th>
            <td style="padding: 10px;">{{ $livre->auteur->name }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Date de naissance</th>
            <td style="padding: 10px;">{{ $livre->auteur->date_naissance }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px;">Email</th>
            <td style="padding: 10px;">{{ $livre->auteur->mail }}</td>
        </tr>
        @if($livre->auteur->continent)
        <tr>
            <th style="text-align: left; padding: 10px;">Continent</th>
            <td style="padding: 10px;">{{ $livre->auteur->continent }}</td>
        </tr>
        @endif
    </table>

    <div style="margin: 20px 0;">
        <h3>Navigation</h3>
        <a href="/livres">← Retour à la liste des livres</a><br><br>
        
        @if($livre->categorie)
            <a href="/livres/categories?categorie={{ $livre->categorie->id }}">Voir les autres livres de la catégorie "{{ $livre->categorie->nom }}"</a><br><br>
        @endif
        
        <a href="/auteurs">Voir tous les auteurs</a><br><br>
        <a href="/categories">Voir toutes les catégories</a><br><br>
        <a href="/">Retour à l'accueil</a>
    </div>

</body>
</html>
