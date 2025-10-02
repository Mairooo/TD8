<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory; // <-- indispensable pour utiliser ::factory()
    
    protected $fillable = ['titre', 'date_publication', 'auteur_id', 'categorie_id'];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
