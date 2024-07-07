<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userbusiness = [
            [
                'userId' => 1,
                'businessName' => 'Demo',
                'businessType' => 'Demo',
                'businessOwner' => 'Demo',
                'businessContactNumber' => '081234567890',            
            ],
        ];

        DB::table('userBusiness')->insert($userbusiness);
    }
}
