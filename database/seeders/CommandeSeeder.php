<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Commande;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $statuts = ['en_attente', 'terminee', 'annulee'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('commandes')->insert([
                'user_id' => rand(1, 10), 
                'total' => rand(50, 200), 
                'statut' => $statuts[rand(0, 2)], 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

