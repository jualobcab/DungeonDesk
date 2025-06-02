<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('pass123'),
                'email' => 'admin@example.com',
                'role' => 'admin'
            ],
            [
                'username' => 'player1',
                'password' => Hash::make('secret'),
                'email' => 'player1@example.com',
                'role' => 'user'
            ],
            [
                'username' => 'player2',
                'password' => Hash::make('hidden'),
                'email' => 'player2@example.com',
                'role' => 'user'
            ]
        ]);
    }
}