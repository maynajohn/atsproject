<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidat_id', 'offre_emploi_id', 'cv', 'lettre_motivation', 'statut',
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function offre()
    {
        return $this->belongsTo(OffreEmploi::class, 'offre_emploi_id');
    }

    public function convocation()
    {
        return $this->hasOne(Convocation::class);
    }
}
