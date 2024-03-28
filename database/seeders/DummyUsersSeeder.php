<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Pengelola Gudang 1',
                'email'=>'pengelolagudang@gmail.com',
                'role'=>'pengelola_gudang',
                'password'=>bcrypt('12345678')
            ],
            [
                'name'=>'Administrator 1',
                'email'=>'administrator1@gmail.com',
                'role'=>'administrator',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key =>$val){
            User::create($val);
        }
    }
}
