<div>
    <form wire:submit.prevent="save">
        <input type="text" wire:model="name" placeholder="Nom">
        @error('name') <span style="color: red">{{ $message }}</span> @enderror

        <input type="date" wire:model="date_naissance">
        @error('date_naissance') <span style="color: red">{{ $message }}</span> @enderror

        <select wire:model="continent">
            <option value="">-- Choisir un continent --</option>
            <option value="Amerique du Nord">Amérique du Nord</option>
            <option value="Amerique du Sud">Amérique du Sud</option>
            <option value="Asie">Asie</option>
            <option value="Europe">Europe</option>
            <option value="Afrique">Afrique</option>
            <option value="Oceanie">Océanie</option>
        </select>
        @error('continent') <span style="color: red">{{ $message }}</span> @enderror

        <input type="email" wire:model="mail" placeholder="Email">
        @error('mail') <span style="color: red">{{ $message }}</span> @enderror

        <button type="submit">Ajouter</button>
    </form>

    @if (session()->has('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif
</div>
