<?php

namespace App\Http\Controllers\Fornisseur;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FornisseurController extends Controller
{
    public function statistique()
    {
        //fornisseur id
        $id=Auth::id();
        // Nombre total de mes produits*
        $totalProduits = DB::table('produits')
        ->where('user_id',$id)
        ->count();

        // Nombre total de  catégories qui j'ai utiliser*
        $totalCategories = DB::table('categories')
        ->join ('produits', 'categories.id', '=', 'produits.category_id')
        ->count();

        // Nombre total de ventes *
        $totalVentes = DB::table('commande_produit')->sum('quantite');

        // Mes acheteurs en fonction de la région (groupé par région)*
        $acheteursParRegion = DB::table('commandes')
            ->join('users', 'commandes.user_id', '=', 'users.id')
            ->select(DB::raw('users.region, COUNT(DISTINCT commandes.user_id) as total_acheteurs'))
            ->groupBy('users.region')
            ->get();

        // Produit le plus acheté *
        $produitLePlusAchete = DB::table('commande_produit')
            ->join('produits', 'commande_produit.produit_id', '=', 'produits.id')
            ->select(DB::raw('produits.nom, SUM(commande_produit.quantite) as total_quantite'))
            ->groupBy('produits.nom')
            ->orderBy('total_quantite', 'desc')
            ->first();

        // Produit le moins acheté *
        $produitLeMoinsAchete = DB::table('commande_produit')
            ->join('produits', 'commande_produit.produit_id', '=', 'produits.id')
            ->select(DB::raw('produits.nom, SUM(commande_produit.quantite) as total_quantite'))
            ->groupBy('produits.nom')
            ->orderBy('total_quantite', 'asc')
            ->first();

        // Produit le plus cher*
        $produitLePlusCher = DB::table('produits')
            ->orderBy('prix', 'desc')
            ->first();

        // Produit le moins cher
        $produitLeMoinsCher = DB::table('produits')
            ->orderBy('prix', 'asc')
            ->first();

        return view('Fornisseur.statistique', compact(
            'totalProduits',
            'totalCategories',
            'totalVentes',
            'acheteursParRegion',
            'produitLePlusAchete',
            'produitLeMoinsAchete',
            'produitLePlusCher',
            'produitLeMoinsCher'
        ));
    }
}

