<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'secteur_activite', 'description', 'site_web', 'adresse', 'logo', 'taille', 'user_id',
    ];


    public function offres()
    {
        return $this->hasMany(OffreEmploi::class);
    }
}
