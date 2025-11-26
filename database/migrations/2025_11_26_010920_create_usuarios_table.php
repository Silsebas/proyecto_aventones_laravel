<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_usuarios_table.php
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('cedula', 20)->unique();
            $table->date('fecha_nacimiento');
            $table->string('correo', 100)->unique();
            $table->string('telefono', 20);
            $table->string('foto_perfil')->nullable();
            $table->string('password_hash'); // En Laravel, se llamará 'password'
            $table->enum('rol', ['admin', 'chofer', 'pasajero']);
            $table->enum('estado', ['pendiente', 'activo', 'inactivo'])->default('pendiente');
            $table->string('token_activacion', 100)->nullable();
            $table->timestamps(); // Crea `created_at` y `updated_at` (similar a tu `fecha_registro`)
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
