<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'chofer_id',
        'placa',
        'marca',
        'modelo',
        'color',
        'ano',
        'capacidad_asientos',
        'foto_vehiculo',
    ];

    // --- RELACIONES ---

    /**
     * Obtiene el usuario (chofer) al que pertenece el vehículo.
     */
    public function chofer()
    {
        // Un vehículo pertenece a un Usuario.
        // El segundo argumento 'chofer_id' es la llave foránea en la tabla 'vehiculos'.
        return $this->belongsTo(Usuario::class, 'chofer_id');
    }

    /**
     * Obtiene los rides asociados a este vehículo.
     */
    public function rides()
    {
        return $this->hasMany(Ride::class, 'vehiculo_id');
    }
}
