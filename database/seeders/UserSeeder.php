<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ])->assignRole('admin');
        
        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
        ])->assignRole('user');

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'sis@gmail.com',
            'password' => bcrypt('sis123'),
        ])->assignRole('vendor');
    }
}
