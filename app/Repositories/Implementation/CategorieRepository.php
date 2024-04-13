<?php
namespace App\Repositories\Implementation;

use App\Models\Categorie;
use App\Repositories\CategorieRepositoryInterface;

class CategorieRepository implements CategorieRepositoryInterface
{
    public function getAll()
    {
        return Categorie::all();
    }

    public function getById($id)
    {
        return Categorie::find($id);
    }

    public function create(array $data)
    {
        return Categorie::create($data);
    }

    public function update($id, array $data)
    {
        $category = Categorie::find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return Categorie::destroy($id);
    }

    public function getByAttributes($attributes){
        $categorie = Categorie::where('nom', $attributes)->first();
        if($categorie){
            return $categorie;
        }
            return false;
        
    }
}