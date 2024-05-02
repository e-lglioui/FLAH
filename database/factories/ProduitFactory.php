<?php

namespace Database\Factories;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->sentence,
            'prix' => $this->faker->numberBetween(100, 1500),
            'quantite' => $this->faker->numberBetween(1, 100),
            'category_id' => Categorie::inRandomOrder()->first()->id, // Catégorie aléatoire
            'user_id' => 1  // Assurez-vous qu'il y a un utilisateur avec cet ID
        ];
    }
}
