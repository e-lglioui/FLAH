<?php
namespace App\Repositories;

use App\Models\Categorie;

class EloquentCategoryRepository implements CrudRepositoryInterface
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
    public function getByAttributes(array $attributes){
        return Categorie::where($attributes)->first();
    }
}