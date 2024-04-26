<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVou extends Model
{
    use HasFactory;

    protected $fillable = [
        'veterinaire_id',
        'user_id',
        'date_heure',
        'statut',
    ];
    
    public function veterinaire()
    {
        return $this->belongsTo(User::class, 'veterinaire_id','id');
    }


    public function client()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
