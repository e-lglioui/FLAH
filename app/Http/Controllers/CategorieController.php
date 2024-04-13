<?php

namespace App\Http\Controllers;

use App\Services\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\utils\ResponseMessage;

class CategorieController extends Controller
{
    protected $categoryService;

    public function __construct(CategorieService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);

        if ($category) {
            return response()->json($category);
        } else {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|unique:categories',
            'descreption' => 'unique:categories',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $category = $this->categoryService->create($request->all());

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|unique:categories,nom,' . $id,
            'descreption' => 'required|unique:categorie
            s,nom,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $category = $this->categoryService->updateCategory($id, $request->all());

        if ($category) {
            return response()->json($category);
        } else {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }

    public function destroy($id)
    {
        $result = $this->categoryService->deleteCategory($id);

        if ($result) {
            return response()->json(['message' => 'Category deleted successfully']);
        } else {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }


    
    
    public function categorie(Request $request) {
        // if (!auth()->check()) {
        //     return "Unauthenticated";
        // }

        $categorie = $this->categoryService->categoieExiste($request->nom);
        
        if($categorie != null) {
            
            if ($request->productList == null) {
                return "message";
            }
            
            $productList = $request->productList;

            foreach($productList as $produit) {
                    Produit::create([
                        'nom' => $produit['nom'],
                        'description' => $produit['description'],
                        'prix' => $produit['prix'],
                        'quantite' => $produit['quantite'],
                        'category_id' => $categorie->id,
                        'user_id' => 2
                    ]);
            }
            
            $dataJson = [
                "categorie" => $categorie,
                "products" => $productList
            ];

            $responseMessage = new ResponseMessage (
                "Produit ajouté",
                "info",
                "201",
                (object) $dataJson
            );

            return response()->json($responseMessage);
        }

        $categorie = Categorie::create([
            "nom" => $request->name,
        ]);
        
        if($categorie) {
            $produitListe = $request->produit;
            
            foreach($produitListe as $produit) {
                $newProduit = Produit::create([
                    'nom' => $produit['nom'],
                    'description' => $produit['description'],
                    'prix' => $produit['prix'],
                    'quantite' => $produit['quantite'],
                    'category_id' => $categorie->id,
                    'user_id' => 2
                ]);
            }
            
            return response()->json(['message' => 'Produits ajoutés, ajout de la catégorie']);
            
        
    }
}
    


}
// //{
//     "nom": "Animale",
//     "descreption":"vache"
// }.