<?php 

namespace App\Services;
use App\Repositories\UserRepositoryInterface;

class UserService
{
    protected $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

public function totalUser(){
    $data = $this->UserRepository->getAll();
    $total = $data->count();
    return $total;
}

// public function totalUserActive(){
//          $total= $this->totalUser();

// }

public function Register(){
    $user = $this->UserRepository->getAll();
    if(!user){
        
    }

}



}