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
                'title' => 'Comida Japonesa1',
                'context' => 'testtesttesttesttesttesttesttesttestestesetsssstestsettesttesetestestesttesttest',
                'image' => '/images/recipe1/oyakodon.jpg',
                'created_at' => '2023/06/19'
            ],
            [
                'title' => 'Comida Japonesa2',
                'context' => 'testtesttesttesttesttesttesttesttestestesetsssstestsettesttesetestestesttesttest',
                'image' => '/images/recipe1/oyakodon.jpg',
                'created_at' => '2023/06/19'
            ],
            [
                'title' => 'Comida Japonesa3',
                'context' => 'testtesttesttesttesttesttesttesttestestesetsssstestsettesttesetestestesttesttest',
                'image' => '/images/recipe1/oyakodon.jpg',
                'created_at' => '2023/06/19'
            ],
        ]);
    }
}
