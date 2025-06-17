<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidature_id', 'date_convocation', 'message', 'statut_envoye',
    ];

    protected $casts = [
        'statut_envoye' => 'boolean',
        'date_convocation' => 'datetime',
    ];

    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
}
