<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class LoginUserSeeder extends Seeder
{
    /**
     * Seed a default login user.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@conchamps.com'],
            [
                'name' => 'Admin User',
                'password' => 'password123',
            ]
        );
    }
}
