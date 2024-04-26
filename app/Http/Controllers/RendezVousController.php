<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVou ;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class RendezVousController extends Controller
{

public function veterinaireFiltter(Request $request){

    $veterinaire=User::where('role_id',3)->get();
    // dd($veterinaire->where('ville','Nador'));
    if($request->ville==null){
        $region=$request->region;
        $fillterRegion=$veterinaire->where('region','$region')->get();
        return view('veterinaires.veterinaire',compact('fillterRegion'));
    }else{
        $ville=$request->ville;
        // dd($ville);
        $fillterVille= $veterinaire->where('ville',$ville);
        // dd( $fillterVille);
        return view('veterinaires.veterinaireFiltter',compact('fillterVille'));
    }

    
}
public function veterinaire(){

    return view('veterinaires.veterinaire');
}

public function rendezvous($id){
//   dd($id);
    return view('veterinaires.reservation',compact('id'));

}
public function reservation(Request $request)
{
    // dd($request->veterinaire_id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'service' => 'required|string',
        'message' => 'nullable|string',
        'veterinaire_id' => 'required|integer|exists:users,id',
    ]);

    // dd('test1');
    $rendezvous = new RendezVou();
    $rendezvous->veterinaire_id = $validatedData['veterinaire_id'];
    $rendezvous->user_id = Auth::id(); 
    $rendezvous->date_heure = "{$validatedData['date']} {$validatedData['time']}"; 
    $rendezvous->statut = 'en_attente'; 
    $rendezvous->nom_complet=$validatedData['name'];
    $rendezvous->service=$validatedData['service'];
    $rendezvous->message=$validatedData['message'];
    $rendezvous->telephone=$validatedData['phone'];
    $rendezvous->save();

    return redirect()->route('Veterinarian')->with('success', 'Votre rendez-vous a été pris avec succès.');
}

}
