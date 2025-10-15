<!-- resources/views/livewire/search-bar.blade.php -->
<div>
    <input type="text" wire:model.live="query" placeholder="Search...">
    
    @if (!empty($resultsAuteurs))
        <div>
            <h1>Auteurs</h1>
            <ul>
                @foreach ($resultsAuteurs as $auteur)
                    <li class="p-2 hover:bg-gray-100 rounded">
                        <strong>{{ $auteur->name }}</strong><br>
                        <small>{{ $auteur->mail }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="text-gray-500">Aucun auteur trouvé.</p>
    @endif
    
    @if (!empty($resultsLivres))
        <div>
            <h1>Livres</h1>
            <ul>
                @foreach ($resultsLivres as $livre)
                    <li class="p-2 hover:bg-gray-100 rounded">
                        <strong>{{ $livre->titre }}</strong><br>
                        <small>{{ $livre->auteur->name ?? 'Auteur inconnu' }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="text-gray-500">Aucun livre trouvé.</p>
    @endif
</div>
