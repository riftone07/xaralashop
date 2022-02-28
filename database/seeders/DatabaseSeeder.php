<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* \App\Models\User::factory(10)->create();
        $this->call(CategorieSeeder::class);
         \App\Models\Produit::factory(100)->create();*/

        $this->call(OptionTableSeeder::class);
        $this->call(OptionProduitSeeder::class);
    }
}
