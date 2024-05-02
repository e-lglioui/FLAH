<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer 10 images associées à des produits aléatoires
        Image::factory(10)->create();  // Générer 10 images aléatoires
    }
}
