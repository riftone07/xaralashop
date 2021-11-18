<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Categorie::create([
            'libelle' => "Mode Homme",
            'image' => "modehomme.jpg"
        ]);
        \App\Models\Categorie::create([
            'libelle' => "Mode Femme",
            'image' => "modefemme.jpg"
        ]);
        \App\Models\Categorie::create([
            'libelle' => "Mode Enfant",
            'image' => "modeenfant.jpg"
        ]);
    }
}
