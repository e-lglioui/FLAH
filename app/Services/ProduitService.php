<?php 

namespace App\Services;

use App\Repositories\ProduitRepositoryInterface;

class ProduitService
{
    protected $ProduitRepository;

    public function __construct(ProduitRepositoryInterface $ProduitRepository)
    {
        $this->ProduitRepository = $ProduitRepository;
    }

    public function getAllProduits()
    {
        $data = $this->ProduitRepository->getAll();

        if ($data != null)  {
            return [
                "message" => 'Succes',
                "productList" => $data
            ];
        } else {
            return [
                "message" => "database empty",
                "productList" => null
            ];
        }
    }

    public function getProduitById($id)
    {
        return $this->ProduitRepository->getById($id);
    }

    public function create(array $data)
    {
        
        return $this->ProduitRepository->create($data);
    }

    public function updateProduit($id, array $data)
    {
        return $this->ProduitRepository->update($id, $data);
    }

    public function deleteProduit($id)
    {
        return $this->ProduitRepository->delete($id);
    }


   public function getProduitsByFournisseur($id){
    return $this ->ProduitRepository->fornisseur($id);
   }
}

