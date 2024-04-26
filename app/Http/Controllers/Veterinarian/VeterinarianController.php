<?php

namespace App\Http\Controllers\Veterinarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class VeterinarianController extends Controller
{
    public function statistiques(){

        return view('veterinaires.dashboard');
    }
}
