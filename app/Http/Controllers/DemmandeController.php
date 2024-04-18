<?php

namespace App\Http\Controllers;

use App\Services\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Demmande;
use Illuminate\Support\Facades\Auth;
use App\utils\ResponseMessage;

class DemmandeController extends Controller
{

public function contact(){
    return view('contact');
}
}