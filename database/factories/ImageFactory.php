<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'produit_id' => Produit::inRandomOrder()->first()->id,  // Associer à un produit aléatoire
            'chemin' => $this->faker->imageUrl(640, 480, 'technics', true),  // Générer un URL d'image aléatoire
        ];
    }
}
