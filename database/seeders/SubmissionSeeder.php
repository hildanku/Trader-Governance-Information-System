<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $submission = [
            [
                'userId' => 1,
                'businessId' => 1,
                'locationId' => 1,
                'status' => 'pending',
                'reviewedBy' => 1
            ]
            ];

        DB::table('submissions')->insert($submission);
    }
}
