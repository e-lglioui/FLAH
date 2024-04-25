<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous ;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RendezVousController extends Controller
{


public function veterinaire(){
    $veterinaire=User::where('role_id',3)->get();
    // dd($veterinaire)   ; 
   return view('veterinaire');
}

}
