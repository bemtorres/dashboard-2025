<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Admin',
            'last_name' => 'Principal',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Crear usuarios regulares
        $users = [
            [
                'name' => 'Juan',
                'last_name' => 'Pérez',
                'email' => 'juan.perez@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'María',
                'last_name' => 'García',
                'email' => 'maria.garcia@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Carlos',
                'last_name' => 'López',
                'email' => 'carlos.lopez@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => null, // Usuario no verificado
            ],
            [
                'name' => 'Ana',
                'last_name' => 'Martínez',
                'email' => 'ana.martinez@example.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Pedro',
                'last_name' => 'Rodríguez',
                'email' => 'pedro.rodriguez@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
