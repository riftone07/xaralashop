<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nom = $this->faker->sentence(3);
        return [
            "slug" => Str::slug($nom),
            "nom" => $nom,
            "description" => $this->faker->paragraph(),
            "prix" => rand(15000,20000),
            "quantite" => rand(10,20),
            "actif" => $this->faker->boolean(),
            "image" => $this->faker->imageUrl($width = 640, $height = 480, 'fashion'),
            "categorie_id" => rand(1,3)
        ];
    }
}
