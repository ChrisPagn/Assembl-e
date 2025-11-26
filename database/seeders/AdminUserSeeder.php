<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer l'utilisateur administrateur
        User::firstOrCreate(
            ['email' => 'christopher.pagnotta.testapp@gmail.com'],
            [
                'name' => 'Administrateur',
                'password' => Hash::make('Admin2024!'),
                'role' => 'admin',
            ]
        );

        // Créer un utilisateur modérateur de test
        User::firstOrCreate(
            ['email' => 'moderateur@assemblee-hogne.be'],
            [
                'name' => 'Modérateur Test',
                'password' => Hash::make('Moderateur2024!'),
                'role' => 'moderateur',
            ]
        );
    }
}
