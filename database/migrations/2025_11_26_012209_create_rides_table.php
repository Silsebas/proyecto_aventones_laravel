<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_rides_table.php
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chofer_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->string('nombre_ride', 100);
            $table->string('lugar_salida');
            $table->string('lugar_llegada');
            $table->dateTime('fecha_hora_salida');
            $table->decimal('costo_espacio', 10, 2);
            $table->integer('espacios_totales');
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('chofer_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
