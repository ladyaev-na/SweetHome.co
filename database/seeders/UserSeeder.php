<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'login' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => 'admin',
            'tel' => '56565656565',
            'api_token' => 1,
            'role_id' => 1,
        ]);
    }
}
