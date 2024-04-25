<?php

namespace App\Models;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'produit_id',
        'chemin', 
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    use HasFactory;
}
