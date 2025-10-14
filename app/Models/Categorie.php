<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'intitule',
        'description'
    ];

    public function livres()
    {
        return $this->belongsToMany(\App\Models\Livre::class);
    }
}
