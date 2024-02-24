<?php 

namespace App\Services;

use App\Repositories\CrudRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CrudRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function create(array $data)
    {
        $existingCategory = $this->categoryRepository->getByAttributes(['nom' => $data['nom']]);
        if ($existingCategory) {
            return $this->updateCategory($existingCategory->id, $data);
        }
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }
}

