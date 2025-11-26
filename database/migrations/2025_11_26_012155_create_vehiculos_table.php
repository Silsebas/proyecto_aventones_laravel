<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_vehiculos_table.php
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chofer_id'); // Columna para la llave foránea
            $table->string('placa', 15)->unique();
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('color', 30);
            $table->integer('ano');
            $table->integer('capacidad_asientos');
            $table->string('foto_vehiculo')->nullable();
            $table->timestamps(); // Laravel añade created_at y updated_at por convención

            // Definición de la llave foránea
            $table->foreign('chofer_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
