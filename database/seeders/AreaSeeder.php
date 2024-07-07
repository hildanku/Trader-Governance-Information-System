<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areaData = [
            [
                'areaCode' => '001',
                'areaName' => 'Area 1',
                'areaFacilities' => 'Wifi'
            ]
            ];
            DB::table('areas')->insert($areaData);
    }
}
