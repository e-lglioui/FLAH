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
        $total=RendezVou::where('veterinaire_id',$id)->count();

        return view('veterinaires.statistique');
    }

    public function rendezvous()
    {
        $today = Carbon::now()->startOfDay(); 
        $endOfDay = Carbon::now()->endOfDay(); 
    
        $id = Auth::id(); 
        $rendezVousDuJour = RendezVou::where('veterinaire_id', $id)
                                    ->whereBetween('date_heure', [$today, $endOfDay])
                                    ->get();
       $rendezVousAll=RendezVou::where('veterinaire_id', $id)->get();

        return view('veterinaires.rendezvous', compact('rendezVousDuJour','rendezVousAll'));
    }

    public function confermer ($id){

    }
    
    public function anuller ($id){
        
    }

}
