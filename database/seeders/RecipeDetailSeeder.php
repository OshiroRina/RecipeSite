<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_details')->insert([
            [
                'title' => 'Primero',
                'explanation' => ': Lava las verduras y corta como la foto.',
                'recipe_id' => '1',
                'delete_flag' => 0,
            ],
            [
                'title' => 'Segundo',
                'explanation' => 'Frie esas verduras y huevos juntos',
                'recipe_id' => '1',
                'delete_flag' => 0,
            ],
            [
                'title' => 'Tercera',
                'explanation' => 'Apaga el furgo',
                'recipe_id' => '1',
                'delete_flag' => 0,
            ],
            [
                'title' => 'Primero',
                'explanation' => ': Lava las verduras y corta como la foto.',
                'recipe_id' => '2',
                'delete_flag' => 0,
            ],
            [
                'title' => 'Segundo',
                'explanation' => 'Frie esas verduras y huevos juntos',
                'recipe_id' => '2',
                'delete_flag' => 0,
            ],

        ]);
    }
}
