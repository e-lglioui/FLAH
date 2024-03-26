<?php

namespace App\Http\Controllers;

use App\Services\CategorieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'descreption' => 'required|unique:categories',
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
            'descreption' => 'required|unique:categories,nom,' . $id,
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
}
// //{
//     "nom": "Animale",
//     "descreption":"vache"
// }.