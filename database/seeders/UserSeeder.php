<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),  // Default password
            'type' => 'ADMIN',
        ]);

        // Default Support IT User
        User::create([
            'name' => 'Support IT User',
            'email' => 'support@example.com',
            'password' => Hash::make('password'),  // Default password
            'type' => 'SUPPORT_IT',
        ]);

        // Default Normal User
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),  // Default password
            'type' => 'USER',
        ]);
    }
}
