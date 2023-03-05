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
                'name' => 'Carne',
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Pescados',
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Huevos',
                'primary_category_id' => 1,
            ],
            [
                'name' => 'Arroces',
                'primary_category_id' => 2,
            ],
            [
                'name' => 'Fideos',
                'primary_category_id' => 2,
            ]
        ]);
    }
}
