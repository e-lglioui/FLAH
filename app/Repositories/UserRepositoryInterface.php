<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function getRole($id);
    public function create(array $data);
    public function update($id, array $data);//update profile of user
    public function delete($id);//delate a fornisseur
    public function blockUser($id);
    public function getByAttributes(array $attributes);
    public function getBylocalisation($attributes);//afficher les user par son localisation
}