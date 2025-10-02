<div style="border:1px solid #ccc; padding:10px; margin-top:10px;">
    <h3>Ajouter un auteur</h3>
    <form wire:submit.prevent="ajouter">
        <label>Nom :</label>
        <input type="text" wire:model="name">
        <br><br>
        
        <label>Date de naissance :</label>
        <input type="date" wire:model="date_naissance">
        <br><br>
        
        <label>Continent :</label>
        <select wire:model="continent">
            <option value="">-- Choisir --</option>
            <option>Amerique du Nord</option>
            <option>Amerique du Sud</option>
            <option>Asie</option>
            <option>Afrique</option>
            <option>Europe</option>
            <option>Oceanie</option>
        </select>
        <br><br>
        
        <button type="submit">Ajouter</button>
    </form>
</div>
