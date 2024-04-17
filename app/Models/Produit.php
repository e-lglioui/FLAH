<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\User;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 
        'description',
        'prix',
        'quantite',
        'category_id',
        'forniseur_id',
        'user_id'
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function forniseur(){
        return $this->belongsTo(User::class);
    }

    public function paniers()
{
    return $this->belongsToMany(Panier::class)->withPivot('quantite');
}

public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot('quantite');
    }
}
