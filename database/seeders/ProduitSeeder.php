<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assurez-vous que les catégories sont définies
        $animaux = Categorie::where('nom', 'Animaux')->first();
        $alimentation = Categorie::where('nom', 'Alimentation')->first();
        $semences = Categorie::where('nom', 'Semences')->first();
        $insecticides = Categorie::where('nom', 'Insecticides')->first();
        $engrais = Categorie::where('nom', 'Engrais')->first();

        // Créer des produits uniques de base
        Produit::create([
            'nom' => 'Bovins',
            'description' => 'Animaux d\'élevage',
            'prix' => 1500,
            'quantite' => 10,
            'category_id' => $animaux->id,
            'user_id' => 1
        ]);

        Produit::create([
            'nom' => 'Maïs',
            'description' => 'Alimentation de base',
            'prix' => 500,
            'quantite' => 50,
            'category_id' => $alimentation->id,
            'user_id' => 1
        ]);

        // Utilisation de l'usine pour créer 13 produits supplémentaires
        Produit::factory(13)->create();  // Cela crée 13 produits aléatoires
    }
}
