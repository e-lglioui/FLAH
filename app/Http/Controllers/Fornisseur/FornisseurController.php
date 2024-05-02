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
        $totalVentes = DB::table('panier_produits')->sum('quantite');

        //Mes acheteurs en fonction de la région (groupé par région)*
        $acheteursParRegion = DB::table('paniers')
            ->join('users', 'paniers.users_id', '=', 'users.id')
            ->select(DB::raw('users.region, COUNT(DISTINCT paniers.users_id) as total_acheteurs'))
            ->groupBy('users.region')
            ->get();

        // Produit le plus acheté *
        $produitLePlusAchete = DB::table('panier_produits')
            ->join('produits', 'panier_produits.produit_id', '=', 'produits.id')
            ->select(DB::raw('produits.nom, SUM(panier_produits.quantite) as total_quantite'))
            ->groupBy('produits.nom')
            ->orderBy('total_quantite', 'desc')
            ->first();

        // Produit le moins acheté *
         $produitLeMoinsAchete = DB::table('panier_produits')
        ->join('produits', 'panier_produits.produit_id', '=', 'produits.id')
        ->select(DB::raw('produits.nom, SUM(panier_produits.quantite) as total_quantite'))
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

