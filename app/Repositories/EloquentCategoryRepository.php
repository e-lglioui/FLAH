<?php
namespace App\Repositories;

use App\Models\Category;

class EloquentCategoryRepository implements CrudRepositoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function getById($id)
    {
        return Category::find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $category = Category::find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return Category::destroy($id);
    }
}