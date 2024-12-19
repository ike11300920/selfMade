<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'name' => 'test1',
                'email' => 'test1@test.co.jp',
                'password' => bcrypt('11111111'),
                'created_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@test.co.jp',
                'password' => bcrypt('22222222'),
                'created_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ]
        ];

        foreach ($params as $param) {
            DB::table('users')->insert($param);
        }
    }
}
