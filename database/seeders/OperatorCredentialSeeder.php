<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OperatorCredential;
use Illuminate\Support\Facades\Hash;

class OperatorCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'fullname'=>'Operator A',
                'username'=>'operator',
                'email'=>'operator@trader-governance.com',
                'password'=>Hash::make('operator')
            ],
        ];

        foreach ($user as $key => $value) {
            OperatorCredential::create($value);
        }
    }
}
