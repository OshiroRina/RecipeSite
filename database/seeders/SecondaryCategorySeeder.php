<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecondaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secondary_categories')->insert([
            [
                'name' => 'Pollo',
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Cerdo',
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Vaca',
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Salmón',
                'primary_category_id' => 2,
            ],
            [
                'name' => 'Gamba',
                'primary_category_id' => 2,
            ],
            [
                'name' => 'Tomate',
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Verengena',
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Repollo',
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Zanahoria',
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Rechuga',
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Rechuga',
                'primary_category_id' => 3,
            ],
            [
                'name' => 'Onigiri',
                'primary_category_id' => 4,
            ],
            [
                'name' => 'Don',
                'primary_category_id' => 4,
            ],
            [
                'name' => 'Udon',
                'primary_category_id' => 5,
            ],
            [
                'name' => 'Somen',
                'primary_category_id' => 5,
            ],
            [
                'name' => 'Yakisoba',
                'primary_category_id' => 5,
            ],
            [
                'name' => 'Salsa de tomate',
                'primary_category_id' => 6,
            ],
            [
                'name' => 'Salsa japonesa',
                'primary_category_id' => 6,
            ],
            [
                'name' => 'Sopa de miso',
                'primary_category_id' => 7,
            ],
            [
                'name' => 'Sopa al estilo chino',
                'primary_category_id' => 7,
            ],
            [
                'name' => 'Mochi',
                'primary_category_id' => 8,
            ],
            [
                'name' => 'Dulce Frio',
                'primary_category_id' => 9,
            ],
            [
                'name' => 'Ensalada japonesa',
                'primary_category_id' => 10,
            ],
            [
                'name' => 'Ensalada al estilo chino',
                'primary_category_id' => 10,
            ],
        ]);
    }
}
