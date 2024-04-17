<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $fillable = [
        'veterinaire_id',
        'user_id',
        'date_heure',
        'statut',
    ];

    // Relation avec le modèle User (vétérinaire)
    public function veterinaire()
    {
        return $this->belongsTo(User::class, 'veterinaire_id');
    }

    // Relation avec le modèle User (client)
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
