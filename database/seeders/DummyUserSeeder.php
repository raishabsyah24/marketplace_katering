<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin@mail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],

            [
                'name'=>'Merchant',
                'email'=>'merchant@mail.com',
                'role'=>'merchant',
                'password'=>bcrypt('123456')
            ],

            [
                'name'=>'Customer',
                'email'=>'customer@mail.com',
                'role'=>'customer',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
