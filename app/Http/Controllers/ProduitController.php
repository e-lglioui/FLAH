<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Image;
use App\Models\Categorie;
use App\Services\ProduitService;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        return view('home', compact('produit'));
    }

    public function create()
    {
        $categories=Categorie::all();
        return view('fornisseur.produit-create',compact('categories'));
    }

 
    public function store(Request $request)
    {
            $requestData = $request->all();
            $requestData['user_id'] = 1;
            $validator = Validator::make($requestData, [
                'nom' => 'required',
                'description' => 'required',
                'prix' => 'required',
                'quantite' => 'required',
                'category_id' => 'required',
                'user_id' => 'required',
                'images' => 'nullable|array', //liste des image
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', //valider les images
            ]);
    
            if ($validator->fails()) {
                // dd('test');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $produit = $this->ProduitService->create($requestData);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('images/produits', 'public'); // Stockage de l'image
                    $produit->images()->create(['chemin' => $path]); // Associer l'image au produit
                }
            }
    
            return redirect()->route('produit.index')->with('success', 'Produit créé avec succès');
       
       
        
    }
    

  
    public function show(Produit $produit)
    {
        $images = $produit->images; 
        return view('produit.show', compact('produit', 'images'));
    }
    

  
    public function edit(Produit $produit)
    {
        return view('fornissuer.produit-edit');
    }

   
    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        //
    }


    public function destroy(Produit $produit)
    {
        foreach ($produit->images as $image) {
            Storage::disk('public')->delete($image->chemin); 
            $image->delete(); 
        }
    
        $produit->delete(); 
    
        return redirect()->route('produit.index')->with('success', 'Produit supprimé avec succès');
    }
    
}
