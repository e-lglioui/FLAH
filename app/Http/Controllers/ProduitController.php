<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Services\ProduitService;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProduitController extends Controller
{
    private $ProduitService;

    public function __construct(ProduitService $ProduitService)
    {
        $this->ProduitService = $ProduitService;
    }

    public function index()
    {
        $produit = $this->ProduitService->getAllProduits();
        return response()->json($produit);
    }

    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        if (auth()->check()) {
            $requestData = $request->all();
            $requestData['id_user'] = auth()->user()->id;
    
            $validator = Validator::make($requestData, [
                'nom' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'quantite' => 'required',
                'category_id' => 'required',
                'id_user' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
    
            $Produit = $this->ProduitService->create($requestData);
    
            return response()->json($Produit, 201);
        } else {
            
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

  
    public function show(Produit $produit)
    {
        //
    }

  
    public function edit(Produit $produit)
    {
        //
    }

   
    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        //
    }


    public function destroy(Produit $produit)
    {
        //
    }
}
