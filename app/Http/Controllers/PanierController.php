<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\PanierProduit;
use Illuminate\Support\Facades\Log;
class PanierController extends Controller
{
    public function ajouter(Request $request)
    {

        $users_id = auth()->id();
        $produit_id = $request->input('produit_id');
        $quantite = $request->input('quantite', 1);
        $panier = Panier::firstOrCreate([
            'users_id' =>  $users_id,
        ]);

        $produitPanier = PanierProduit::firstOrCreate([
            'panier_id' => $panier->id,
            'produit_id' => $produit_id,
        ]);

        $produitPanier->quantite += $quantite;
        $produitPanier->save();

        // return view('panier');
    }
}

