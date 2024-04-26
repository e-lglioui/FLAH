<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use App\utils\ResponseMessage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        'user_id' =>Auth::id(), 
        'nom_entreprise' => $validatedData['nom_entreprise'],
        'type' => $validatedData['type'],
        'certification' => $certificatPath,
        'matricule' => $validatedData['matricule'] ?? null,
        'statue'=>0
    ]);


    return redirect()->route('contact')->with('success', 'Votre demande a été soumise avec succès.');
}

public function index()
{
    $total = Demande::all()->count();
    $encour = Demande::where('statue', 0)->get();
    $V = $encour->filter(function ($item) {
        return $item->type === 'veterinaire';
    });

    $F = $encour->filter(function ($item) {
        return $item->type === 'fournisseur';
    });
    // dd($F);
    return view('admin.gestionUser', compact('total', 'V', 'F'));
}

public function destroy($id)
{
    $demande = Demande::find($id);
    
    if ($demande) {
        $demande->delete();
        return redirect()->back()->with('success', 'Demande supprimée avec succès.');
    } else {
        return redirect()->back()->with('error', 'La demande que vous essayez de supprimer n\'existe pas.');
    }
}


public function veterinaire($id)
{
    try {
        $demande = Demande::find($id);

        if (!$demande) {
            return redirect()->back()->with('error', 'Demande non trouvée.');
        }

        $user = $demande->user;

        if ($user->role_id == 1) {
        
            DB::transaction(function () use ($user, $demande) {
                $user->update(['role_id' => 3]);
                
                $demande->update(['statue' => 1]);
              
                // dd('test');
            });

            return redirect()->back()->with('success', 'Demande de vétérinaire acceptée.');
        } else {  
         
            $role=$user->role->name;
            return redirect()->back()->with('info', 'user est deja un '.$role.' dans lapplication');
        }
    } catch (\Exception $exception) {
        DB::rollback(); 
        return redirect()->back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer plus tard.');
    }
}


public function fornissuer($id) {
    try {
        DB::beginTransaction(); 
        $demande = Demande::find($id);

        if (!$demande) {
            DB::rollBack(); 
            return redirect()->back()->with('error', 'Demande non trouvée.');
        }

        $user = $demande->user;

        if ($user->role_id == 1) { 
            $user->role_id = 2; 
            $user->save(); 

            $demande->statue = 1; 
            $demande->save(); 

            DB::commit(); 
            return redirect()->back()->with('success', 'Demande de fornissuer acceptée.');
        } else {
            DB::rollBack(); 
            $role=$user->role->name;
            return redirect()->back()->with('info', 'user est deja un '.$role.' dans lapplication');
        }
    } catch (\Exception $exception) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer plus tard.');
    }
}

}

