<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario; // Importamos el modelo Usuario
use Illuminate\Support\Facades\Hash; // Importamos el Facade para hashear la contraseña

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usamos updateOrCreate para evitar duplicados si ejecutamos el seeder varias veces.
        // Busca un usuario con el correo, si no existe, lo crea con todos los datos.
        Usuario::updateOrCreate(
            ['correo' => 'superadmin@aventones.com'], // Condición de búsqueda
            [
                'nombre' => 'Super',
                'apellido' => 'Admin',
                'cedula' => '0-0000-0000',
                'fecha_nacimiento' => '1990-01-01',
                'telefono' => '99999999',
                'password' => Hash::make('superadmin_password'), // ¡Cambia esta contraseña!
                'rol' => 'superadmin',
                'estado' => 'activo', // El superadmin nace activo.
            ]
        );
    }
}
