<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'name' => 'TestUser',
                'email' => 'test3@test.com',
                'subject' => 'testについて',
                'context' => 'testtesttesttesttest',
                'replay_flag' => 1,
            ],
            [
                'name' => 'TestUser2',
                'email' => 'test5@test.com',
                'subject' => 'test4について',
                'context' => 'testtesttesttesttest',
                'replay_flag' => 0,
            ],
        ]);
    }
}
