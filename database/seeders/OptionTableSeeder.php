<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            "M",
            "XL",
            "XXl",
            "X",
            "S"
        ];

        foreach ($options as $option){
            \App\Models\Option::create([
                'libelle' => $option
            ]);
        }
    }
}
