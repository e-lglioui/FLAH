<?php

namespace App\Http\Controllers\Veterinarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RendezVou ;
use App\Models\User ;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;


class VeterinarianController extends Controller
{
    public function statistiques(){
        $id=Auth::id();
        //nombre de rendez vous
        $total=RendezVou::where('veterinaire_id',$id)->count();

        //nombre de rendez vous en_attente
        $rendezVousAll=RendezVou::where('veterinaire_id', $id)
        ->where('statut', 'en_attente')
        ->count();
         //nombre de rendez vous confirmer
        $rendezConfermer=RendezVou::where('veterinaire_id', $id)
        ->where('statut', 'confirme')
        ->count();
        //nombre de rendez vous annule
        $rendezAnul=RendezVou::where('veterinaire_id', $id)
        ->where('statut', 'annule')
        ->count();
         //nombre de rendez vous au clinic
        $clinic=RendezVou::where('veterinaire_id', $id)
        ->where('service', 'clinic')
        ->count();

        $stable=RendezVou::where('veterinaire_id', $id)
        ->where('service', 'stable')
        ->count();


        return view('veterinaires.statistique',compact('total','rendezVousAll','rendezConfermer','rendezAnul','clinic','stable'));
    }

    public function rendezvous()
    {
        $today = Carbon::now()->startOfDay(); 
        $endOfDay = Carbon::now()->endOfDay(); 
    
        $id = Auth::id(); 
        $rendezVousDuJour = RendezVou::where('veterinaire_id', $id)
                                    ->whereBetween('date_heure', [$today, $endOfDay])
                                    ->get();
       $rendezVousAll=RendezVou::where('veterinaire_id', $id)
       ->where('statut', 'en_attente')
       ->get();

       $rendezConfermer=RendezVou::where('veterinaire_id', $id)
       ->where('statut', 'confirme')
       ->get();

       $rendezAnul=RendezVou::where('veterinaire_id', $id)
       ->where('statut', 'annule')
       ->get();

        return view('veterinaires.rendezvous', compact('rendezVousDuJour','rendezVousAll'));
    }

    public function confermer ($id){

       $rendez= RendezVou::find($id);
       $rendez->update(['statut' => 'confirme']);
       return redirect()->back()->with('success', 'Rendez vous confirmer.');
    }
    
    public function anuller ($id){
        $rendez= RendezVou::find($id);
        $rendez->update(['statut' => 'annule']);
        return redirect()->back()->with('success', 'Rendez vous annule.');
    }

}
