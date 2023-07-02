<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'La base de comida japonesa',
                'context' => "¿Has escuchado 'ichiju-sansai(一汁三菜)'? y sabes qué significa? \n Es un concepto japones que se refiere a un estilo tradicional de comida casera japonesa. Literalmente, 'ichiju-sansai' significa 'un plato y tres acompañamientos' en japonés. Normalmente  consiste en arroz ,sopa , un plato principal y 2 platos acompañados. Es equiliblada nutricionalmente.",
                'image' => '/images/blogs/ichiju-sansai.jpg',
                'created_at' => now()
            ],
            // [
            //     'title' => 'Comida Japonesa2',
            //     'context' => 'testtesttesttesttesttesttesttesttestestesetsssstestsettesttesetestestesttesttest',
            //     'image' => '/images/recipe1/oyakodon.jpg',
            //     'created_at' => '2023/06/19'
            // ],
            // [
            //     'title' => 'Comida Japonesa3',
            //     'context' => 'testtesttesttesttesttesttesttesttestestesetsssstestsettesttesetestestesttesttest',
            //     'image' => '/images/recipe1/oyakodon.jpg',
            //     'created_at' => '2023/06/19'
            // ],
        ]);
    }
}
