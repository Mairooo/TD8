<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle catégorie</title>
</head>
<body>
    <h1>Créer une nouvelle catégorie</h1>

    <p><a href="/categories">← Retour à la liste des catégories</a></p>

    @if ($errors->any())
        <div>
            <strong>Erreurs :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/categories" method="POST">
        @csrf
        
        <p>
            <label for="intitule"><strong>Nom de la catégorie :</strong></label><br>
            <input type="text" id="intitule" name="intitule" value="{{ old('intitule') }}" required>
        </p>

        <p>
            <label for="description"><strong>Description :</strong></label><br>
            <textarea id="description" name="description" rows="4" cols="50">{{ old('description') }}</textarea>
        </p>

        <p>
            <button type="submit">Créer la catégorie</button>
            <a href="/categories">Annuler</a>
        </p>
    </form>

</body>
</html>
