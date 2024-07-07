<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coordinates = [
            [109.651284, -7.669550],
            [109.650978, -7.669111],
            [109.651028, -7.668332],
            [109.651436, -7.667990],
            [109.652313, -7.667945],
            [109.652619, -7.668279],
            [109.652631, -7.668887],
            [109.652264, -7.669489],
        ];

        $locations = [];

        foreach ($coordinates as $index => $coord) {
            $locations[] = [
                'locationCode' => 'Loc' . ($index + 1),
                'locationLongitude' => (string)$coord[0],
                'locationLatitude' => (string)$coord[1],
                'locationDescription' => 'Location ' . ($index + 1),
                // 'status' => $index % 2 == 0 ? 'available' : 'unavailable',
                'areaId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('locations')->insert($locations);
       
    }
}
