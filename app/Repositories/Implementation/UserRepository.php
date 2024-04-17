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

    public function getRole($id)
    {
        $user = User::findOrFail($id);
        return $user->role;
    }


    public function getByAttributes(array $attributes)
    {
        $query = User::query();

        foreach ($attributes as $key => $value) {
            switch ($key) {
                case 'type':
                    $query->where('type', $value);
                    break;
                case 'name':
                    $query->where('name', 'like', '%' . $value . '%');
                    break;
                case 'region':
                    $query->where('region', $value);
                    break;
                case 'ville':
                    $query->where('ville', $value);
                    break;
                
            }
        }

        return $query->get();
    }


    public function blockUser($id)
{
    $user = $this->getById($id);
    $user->type = false; 
    $user->save();
    return $user;
}
public function checkemail($email){
    $user = User::where('email',$email)->first();
    return $user;
}
}