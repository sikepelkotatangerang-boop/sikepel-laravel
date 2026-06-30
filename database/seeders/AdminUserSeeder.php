<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@cibodas.go.id'],
            [
                'name' => 'Admin SIKEPEL',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'kelurahan_id' => 1,
                'is_active' => true,
            ]
        );
        $admin->assignRole('admin');

        $staff = User::firstOrCreate(
            ['email' => 'staff@cibodas.go.id'],
            [
                'name' => 'Staff SIKEPEL',
                'password' => Hash::make('password123'),
                'role' => 'staff',
                'kelurahan_id' => 1,
                'is_active' => true,
            ]
        );
        $staff->assignRole('staff');

        $user = User::firstOrCreate(
            ['email' => 'user@cibodas.go.id'],
            [
                'name' => 'Warga SIKEPEL',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'kelurahan_id' => 1,
                'is_active' => true,
            ]
        );
        $user->assignRole('user');
    }
}
