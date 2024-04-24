<?php


namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
 
    public function ajouterAuPanier(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $produitId = $request->input('produit_id');
            $quantite = $request->input('quantite', 1);

            $panier = Panier::where('user_id', $userId)
                ->where('produit_id', $produitId)
                ->first();

            if ($panier) {
                $panier->quantite += $quantite;
                $panier->save();
            } else {
                Panier::create([
                    'user_id' => $userId,
                    'produit_id' => $produitId,
                    'quantite' => $quantite,
                ]);
            }

            return redirect()->back()->with('success', 'Produit ajouté au panier!');
        }

        return redirect()->back()->with('error', 'Vous devez être connecté pour ajouter au panier.');
    }

    public function afficherPanier()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $panier = Panier::where('user_id', $userId)->get();

            return view('panier', ['panier' => $panier]);
        }

        return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir votre panier.');
    }

    public function supprimerDuPanier($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $panier = Panier::where('user_id', $userId)
                ->where('id', $id)
                ->first();

            if ($panier) {
                $panier->delete();
                return redirect()->back()->with('success', 'Produit supprimé du panier!');
            }

            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        return redirect()->route('login')->with('error', 'Vous devez être connecté pour supprimer un produit du panier.');
    }
}
