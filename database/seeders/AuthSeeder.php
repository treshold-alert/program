<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => '3f5ef0bc-2c3f-4fa6-8e63-b329582d3cfd',
                'username' => 'Pia',
                'email' => 'pia@gmail.com',
                'password' => Hash::make('admin12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
