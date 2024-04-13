<?php
namespace App\Repositories\Implementation;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function getByAttributes($attributes){
        $user = User::where('nom', $attributes)->first();
        if($categorie){
            return $user;
        }
            return false;
        
    }
    public function getRole($id)
    {
    
    }

}