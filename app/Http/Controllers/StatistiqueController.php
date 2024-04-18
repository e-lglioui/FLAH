<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Commande;

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
       
        $userCreationDates = []; 
        $users = User::all();
        foreach ($users as $user) {
            $userCreationDates[] = $user->created_at->format('M d'); 
        }



        $totalproduit = Produit::count();
        $totalcategorie = Categorie::count();

        //top tree seller 


        //top tree product



        //top tree categorie


        //region user 
        $Tanger = User::where('region', 'Tanger-Tétouan-Al Hoceïma')->count();
        $LOriental = User::where('region', 'L\'Oriental')->count();
        $Fes = User::where('region', 'Fès-Meknès')->count();
        $Rabat = User::where('region', 'Rabat-Salé-Kénitra')->count();
        $Mellal = User::where('region', 'Béni Mellal-Khénifra')->count();
        $CasablancaSettat = User::where('region', 'Casablanca-Settat')->count();
        $MarrakechSafi = User::where('region', 'Marrakech-Safi')->count();
        $Tafilalet = User::where('region', 'Drâa-Tafilalet')->count();
        $SoussMassa = User::where('region', 'Souss-Massa')->count();
        $GuelmimOuedNoun = User::where('region', 'Guelmim-Oued Noun')->count();
        $Hamra = User::where('region', 'Laâyoune-Sakia El Hamra')->count();
        $EdDahab = User::where('region', 'Dakhla-Oued Ed-Dahab')->count();
        


        //forinsseur qui auffre max produit

        //fornisseur avec sa liste des produit et quanrtite et categorie
          

         $totalCommande = Commande::count();

        $en_attente= Commande::where('statut', 'en_attente')->count();
         $terminee= Commande::where('statut', 'terminee')->count();
         $annulee= Commande::where('statut', 'annulee')->count();

       
         


        //nombre des visiteur non connecte

        return view('admin.statistique', compact('usersCount', 'fornisseur', 'veterinarian', 'totalproduit', 'totalcategorie', 'annulee', 'terminee', 'en_attente', 'totalCommande', 'userCreationDates','Tanger','LOriental','Fes','Rabat','Mellal','CasablancaSettat','MarrakechSafi','MarrakechSafi','Tafilalet','SoussMassa','GuelmimOuedNoun','Hamra','EdDahab'));

    }

    

}