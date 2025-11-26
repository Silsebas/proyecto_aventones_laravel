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
     *
     * @return void
     */
    public function run()
    {
        // Le decimos a Laravel que ejecute SOLAMENTE los seeders que listamos aquí.
        $this->call([
            UsuarioSeeder::class,
            // Si en el futuro creas un RideSeeder, lo añadirías aquí.
        ]);

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
