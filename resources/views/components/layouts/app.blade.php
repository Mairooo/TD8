<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <header>
            <h1>Application Gestion de Livres</h1>
            <nav>
                <a href="{{ route('auteurs.index') }}">Auteurs</a>
                <a href="{{ route('auteur.create') }}">Ajouter Auteur</a>
            </nav>
        </header>

        {{ $slot }}

        @livewireScripts
    </body>
</html>
