<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'TestUser',
            'email' => 'test1@test.com',
            'country' => 'Japon (日本)',
            'password' => Hash::make('testuser2023'),
            'created_at' => '2023/05/01'
            ],
            [
                'name' => 'TestUser2',
                'email' => 'test2@test.com',
                'country' => 'España (スペイン)',
                'password' => Hash::make('testuser2023'),
                'created_at' => '2023/06/01'
            ],
            [
                'name' => 'TestUser3',
                'email' => 'test3@test.com',
                'country' => 'España (スペイン)',
                'password' => Hash::make('testuser2023'),
                'created_at' => '2023/06/07'
            ],
        ]);

        DB::table('admins')->insert([
            [
                'name' => 'Rina',
                'email' => 'queserasera505050@gmail.com',
                'password' => Hash::make('queserasera0460')
            ],
            [
                'name' => 'AdminTest',
                'email' => 'admin@test.com',
                'password' => Hash::make('admintest2023')
            ],
        ]);
    }
}
