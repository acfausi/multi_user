<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [
            [
            'name'=>'Mas operator',
            'email'=>'mas@gamail.com',
            'role'=>'operator',
            'password'=> bcrypt('123456')
            ],
            [
                'name'=>'Mas keuangan',
                'email'=>'keuangan@gamail.com',
                'role'=>'keuangan',
                'password'=> bcrypt('1234567')
                ],
                [
                    'name'=>'Mas Marketing',
                    'email'=>'market@gamail.com',
                    'role'=>'marketing',
                    'password'=> bcrypt('12345')
                    ],
                ];

                foreach($userData as $key => $val){
                    User::create($val);
                }
    }
}
