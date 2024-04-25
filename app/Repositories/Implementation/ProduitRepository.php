<?php
namespace App\Repositories\Implementation;

use App\Models\Produit;
use App\Repositories\ProduitRepositoryInterface;
class ProduitRepository implements ProduitRepositoryInterface
{
    public function getAll()
    {
        return Produit::all();
    }

    public function getById($id)
    {
        return Produit::find($id);
    }

    public function create(array $data)
    {
        return Produit::create($data);
    }

    public function update($id, array $data)
    {
        $produit = Produit::find($id);
        $produit->update($data);
        return $produit;
    }

    public function delete($id)
    {
        return Produit::destroy($id);
    }
    public function getByAttributes(array $attributes){
        return Produit::where($attributes)->first();
    }

    public function fornisseur($id){
        return Produit::where('user_id', $id)->with('images')->get();
    }
}