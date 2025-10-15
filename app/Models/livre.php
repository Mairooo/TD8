<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Livre extends Model
{
    use Searchable;
    use HasFactory; // <-- indispensable pour utiliser ::factory()
    
    protected $fillable = ['nom', 'date_parution', 'auteur_id'];

    public function toSearchableArray()
    {
        return [
            'nom' => $this->titre,
            'date_parution' => $this->date_publication,
        ];
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
}
