<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'verkoper',
                'email' => 'verkoper@example.com',
                'password' => Hash::make('password'),
                'role' => 'verkoper',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'klant',
                'email' => 'klant@example.com',
                'password' => Hash::make('password'),
                'role' => 'klant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

