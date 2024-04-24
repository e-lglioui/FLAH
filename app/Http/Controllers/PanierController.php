<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\PanierProduit;
use Illuminate\Support\Facades\Log;

class PanierController extends Controller
{

  

    public function ajouterAuPanier(Request $request)
    {
       
        $validated = $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);
    
   
        $users_id = auth()->id();
        
   
        $produit_id = $validated['produit_id'];
        $quantite = $validated['quantite'];
    
    
        $panier = Panier::firstOrCreate([
            'users_id' => $users_id,
        ]);

        $produitPanier = PanierProduit::firstOrCreate([
            'panier_id' => $panier->id,
            'produit_id' => $produit_id,
        ]);
    
       
        $produitPanier->quantite += $quantite;
        $produitPanier->save();
         
        // return view('panier');
        return response()->json(['message' => 'Produit ajouté au panier'], 200);
    }
    
}

