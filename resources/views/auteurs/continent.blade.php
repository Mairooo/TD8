<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteurs - {{ $intitule }}</title>
</head>
<body>
    <h1>Auteurs du continent : {{ $intitule }}</h1>
    
    <p>Nombre d'auteurs trouvés : {{ $auteurs->count() }}</p>
    
    @if($auteurs->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Email</th>
                    <th>Continent</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
                @foreach($auteurs as $auteur)
                    <tr>
                        <td>{{ $auteur->id }}</td>
                        <td>{{ $auteur->name }}</td>
                        <td>{{ $auteur->date_naissance }}</td>
                        <td>{{ $auteur->mail }}</td>
                        <td>{{ $auteur->continent }}</td>
                        <td>{{ $auteur->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun auteur trouvé pour le continent "{{ $intitule }}".</p>
    @endif
    
    <br>
    <a href="/auteurs">Retour à la liste des auteurs</a> | 
    <a href="/">Retour à l'accueil</a>
    
    <hr>
    
    <!-- Formulaire pour faire une nouvelle recherche -->
    <h2>Nouvelle recherche</h2>
    <form method="GET" action="/auteurs/Continent">
        <label for="intitule">Continent :</label>
        <select name="intitule" id="intitule" required>
            <option value="">-- Sélectionnez un continent --</option>
            <option value="Europe" {{ $intitule == 'Europe' ? 'selected' : '' }}>Europe</option>
            <option value="Amérique" {{ $intitule == 'Amérique' ? 'selected' : '' }}>Amérique</option>
            <option value="Asie" {{ $intitule == 'Asie' ? 'selected' : '' }}>Asie</option>
            <option value="Afrique" {{ $intitule == 'Afrique' ? 'selected' : '' }}>Afrique</option>
            <option value="Océanie" {{ $intitule == 'Océanie' ? 'selected' : '' }}>Océanie</option>
        </select>
        <button type="submit">Rechercher</button>
    </form>
</body>
</html>
