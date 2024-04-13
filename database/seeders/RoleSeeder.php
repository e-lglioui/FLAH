<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Agriculteur', 'Fournisseur', 'Vétérinaire', 'Visiteur'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}

