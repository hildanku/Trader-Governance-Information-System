<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserCredential;
use Illuminate\Support\Facades\Hash;


class UserCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'fullname'=>'Demo A',
                'username'=>'demo',
                'email'=>'demo@trader-governance.com',
                'password'=>Hash::make('demo')
            ],
        ];

        foreach ($user as $key => $value) {
            UserCredential::create($value);
        }
    }
}
