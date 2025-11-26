<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_reservas_table.php
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasajero_id');
            $table->unsignedBigInteger('ride_id');
            $table->integer('espacios_solicitados')->default(1);
            $table->enum('estado', ['pendiente', 'aceptada', 'rechazada', 'cancelada'])->default('pendiente');
            $table->timestamps(); // Equivalente a tu `fecha_creacion` y añade `updated_at`

            // Llaves foráneas
            $table->foreign('pasajero_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('ride_id')->references('id')->on('rides')->onDelete('cascade');

            // Constraint para evitar duplicados
            $table->unique(['pasajero_id', 'ride_id'], 'reserva_unica');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
