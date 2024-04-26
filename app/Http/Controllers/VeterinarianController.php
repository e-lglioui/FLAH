<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    public function statistiques(){

        return view('veterinaires.dashboard');
    }
}
