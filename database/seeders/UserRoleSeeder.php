<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Password1@#'),
        ]);

        $user->assignRole('Super Admin');

        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('Password1@#'),
        ])->assignRole('User');

        User::create([
            'name' => 'moderator',
            'email' => 'moderator@example.com',
            'password' => Hash::make('Password1@#'),
        ])->assignRole('Moderator');
    }
}
