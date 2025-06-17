<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'adresse', 'date_naissance', 'niveau_etude', 'domaine',
        'experience', 'statut_emploi', 'disponibilite', 'linkedin',
        'portfolio', 'langue',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
}
