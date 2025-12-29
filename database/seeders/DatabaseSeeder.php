<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur administrateur
        User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'admin@eglise.com',
            'password' => bcrypt('admin123'),
        ]);

        // Créer quelques utilisateurs de test
        User::factory(5)->create();
    }
}
