<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory; // <-- indispensable pour utiliser ::factory()
    
    protected $fillable = [
        'name', 
        'date_naissance',
        'mail',
        'continent',
    ];

    /**
     * Validation de la date de naissance lors de la création/mise à jour
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($auteur) {
            if (!self::isValidDate($auteur->date_naissance)) {
                throw new \InvalidArgumentException('Format de date de naissance invalide. Utilisez le format Y-m-d.');
            }
            
            // Si aucun email n'est fourni, générer un email unique
            if (empty($auteur->mail)) {
                $auteur->mail = 'auteur_' . uniqid() . '@example.com';
            } elseif (!self::isValidEmail($auteur->mail)) {
                throw new \InvalidArgumentException('Format d\'email invalide.');
            }
        });
        
        static::updating(function ($auteur) {
            if (!self::isValidDate($auteur->date_naissance)) {
                throw new \InvalidArgumentException('Format de date de naissance invalide. Utilisez le format Y-m-d.');
            }
            
            // Si aucun email n'est fourni, générer un email unique
            if (empty($auteur->mail)) {
                $auteur->mail = 'auteur_' . uniqid() . '@example.com';
            } elseif (!self::isValidEmail($auteur->mail)) {
                throw new \InvalidArgumentException('Format d\'email invalide.');
            }
        });
    }
    
    /**
     * Vérifie si une date est valide au format Y-m-d
     */
    private static function isValidDate($date)
    {
        $format = 'Y-m-d';
        $dateTime = \DateTime::createFromFormat($format, $date);
        return $dateTime && $dateTime->format($format) === $date;
    }
    
    /**
     * Vérifie si un email est valide
     */
    private static function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}
