<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'dara@gmail.com'],
            [
                'name' => 'Admin User',
                'role' => 'admin',
                'password' => Hash::make('Dara1234!'),
            ]
        );
    }
}
