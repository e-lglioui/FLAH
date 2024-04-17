<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;

class StatistiqueController extends Controller
{
    protected $statistiqueService;

    public function __construct(UserService $statistiqueService)
    {
        $this->statistiqueService = $statistiqueService;
    }


    public function index()
    {
        $usersCount = User::where('role_id', 1)->count();

        $fornisseur = User::where('role_id', 2)->count();
        $veterinarian= User::where('role_id', 3)->count();

        $totalproduit = Produit::count();
        $totalcategorie = Categorie::count();

        //top tree seller 


        //top tree product



        //top tree categorie


        //region user 


        //forinsseur qui auffre max produit

        //fornisseur avec sa liste des produit et quanrtite et categorie
          

        // $totalCommande = Commande::count();

        // $totalSells= Commande::where('statue', 1)->count();
        // $totalanulle= Commande::where('statue', 2)->count();
        // $totalencour= Commande::where('statue', 3)->count();

     
        //nombre des visiteur non connecte

        return view('admin.statistique', compact('usersCount','fornisseur','veterinarian',
        'totalproduit','totalcategorie'));
    }

}