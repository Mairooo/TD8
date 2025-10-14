<div>
    <h2>Créer une nouvelle catégorie</h2>
    
    @if (session()->has('message'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="intitule">Intitulé de la catégorie :</label>
            <input type="text" id="intitule" wire:model="intitule" placeholder="Entrez l'intitulé de la catégorie" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error('intitule') 
                <span style="color: red; font-size: 12px;">{{ $message }}</span> 
            @enderror
        </div>
        
        <button type="submit" style="background-color: #007cba; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            Ajouter la catégorie
        </button>
    </form>
</div>
