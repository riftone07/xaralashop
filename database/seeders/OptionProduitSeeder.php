<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class OptionProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produits = Produit::all();

        $options = Option::pluck('id');

        foreach ($produits as $produit){
            $produit->options()->attach($options);
        }
    }
}
