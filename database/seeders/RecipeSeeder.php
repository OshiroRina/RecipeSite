<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'name' => 'Receta1',
                'secondary_category_id' => 1,
                'information' => 'Es un plato tradicional de la prefecture Aichi.',
            ],
            [
                'name' => 'Receta2',
                'secondary_category_id' => 3,
                'information' => 'Es un plato tradicional de la prefecture Mie.',
            ],
            [
                'name' => 'Receta3',
                'secondary_category_id' => 2,
                'information' => 'Es un plato tradicional de la prefecture Gifu.',
            ],
        ]);
    }
}
