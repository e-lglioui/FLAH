<?php

namespace App\Http\Controllers;

use App\Services\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use App\utils\ResponseMessage;
use Illuminate\Support\Facades\Storage;
class DemandeController extends Controller
{

public function contact(){
    return view('contact');
}
public function demmande(Request $request)
{
    $validatedData = $request->validate([
        'nom_entreprise' => 'required',
        'type' => 'required',
        'certificat' => 'required_if:type,veterinaire|mimes:pdf',
        'matricule' => 'required_if:type,fournisseur',
    ]);

    if ($request->hasFile('certificat')) {
        $certificatPath = $request->file('certificat')->store('certificats', 'public');
    } else {
        $certificatPath = null;
    }

  
    $demande = Demande::create([
        'user_id' =>1, 
        // Auth::id(), 
        'nom_entreprise' => $validatedData['nom_entreprise'],
        'type' => $validatedData['type'],
        'certification' => $certificatPath,
        'matricule' => $validatedData['matricule'] ?? null,
    ]);


    return redirect()->route('contact')->with('success', 'Votre demande a été soumise avec succès.');
}

public function index()
{
    //le nom de v ou f
    //le tele 
    //email
    //matrecul ou certificat
    

}


      
}