<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'Carne',
            ],
            [
                'name' => 'Pescados',
            ],
            [
                'name' => 'Verdura',
            ],
            [
                'name' => 'Arroces',
            ],
            [
                'name' => 'Fideos',
            ],
            [
                'name' => 'Pasta',
            ],
            [
                'name' => 'Sopa',
            ],
            [
                'name' => 'Obento',
            ],
            [
                'name' => 'Dulces',
            ],
            [
                'name' => 'Ensalada',
            ]
        ]);
    }
}
