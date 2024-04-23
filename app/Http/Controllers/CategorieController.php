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
        return view('admin.categorie', compact('categories'));
    }

    public function create(){
        return view('admin.categorie-create');
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);

        if ($category) {
            return view('admin.categorie-show', compact('category'));
        } else {
            return view('404');
        }
    }

    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
       'nom' => 'required|unique:categories',
       'descrption' => 'required',
]);

// dd($request);
        if ($validator->fails()) {
            //  dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
            
        }

        $category = $this->categoryService->create($request->all());
//    dd( $category);
        return redirect()->route('categorie.index')->with('success', 'Catégorie créée avec succès');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|unique:categories,nom,' . $id,
            'descrption' => 'required|unique:categories,descrption,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = $this->categoryService->updateCategory($id, $request->all());

        if ($category) {
            return redirect()->route('categorie.index')->with('success', 'Catégorie mise à jour avec succès');
        } else {
            return view('404');
        }
    }

    public function destroy($id)
    {
        $result = $this->categoryService->deleteCategory($id);

        if ($result) {
            return redirect()->route('categorie.index')->with('success', 'Catégorie supprimée avec succès');
        } else {
            return view('404');
        }
    }

    public function categorie(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'productList' => 'required|array',
            'productList.*.nom' => 'required',
            'productList.*.description' => 'required',
            'productList.*.prix' => 'required|numeric',
            'productList.*.quantite' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $categorie = $this->categoryService->categorieExiste($request->nom);

        if ($categorie) {
            $productList = $request->productList;

            foreach ($productList as $produit) {
                Produit::create([
                    'nom' => $produit['nom'],
                    'description' => $produit['description'],
                    'prix' => $produit['prix'],
                    'quantite' => $produit['quantite'],
                    'category_id' => $categorie->id,
                    'user_id' => Auth::id() 
                ]);
            }

            return redirect()->route('categories.index')->with('success', 'Produits ajoutés avec succès');
        } else {
            $categorie = Categorie::create([
                "nom" => $request->nom,
            ]);

            if ($categorie) {
                $produitListe = $request->productList;

                foreach ($produitListe as $produit) {
                    Produit::create([
                        'nom' => $produit['nom'],
                        'description' => $produit['description'],
                        'prix' => $produit['prix'],
                        'quantite' => $produit['quantite'],
                        'category_id' => $categorie->id,
                        'user_id' => Auth::id() 
                    ]);
                }

                return redirect()->route('categories.index')->with('success', 'Produits ajoutés, catégorie créée avec succès');
            }
        }
    }
    public function edit($id)
{
    $category = $this->categoryService->getCategoryById($id);
    return view('admin.categorie-edit', compact('category'));
}
}

