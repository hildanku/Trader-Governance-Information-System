<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'userId' => 1,
                'gender' => 'male',
                'address' => 'Jl. ABC No. 123',
                'homePhoneNumber' => '081234567890',
            ],
        ];
        DB::table('userdetails')->insert($user);
    }
}
