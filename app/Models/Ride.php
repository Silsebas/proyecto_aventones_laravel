<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'chofer_id',
        'vehiculo_id',
        'nombre_ride',
        'lugar_salida',
        'lugar_llegada',
        'fecha_hora_salida',
        'costo_espacio',
        'espacios_totales',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     */
    protected $casts = [
        'fecha_hora_salida' => 'datetime',
        'costo_espacio' => 'decimal:2',
    ];

    // --- RELACIONES ---

    /**
     * Obtiene el usuario (chofer) que creó el ride.
     */
    public function chofer()
    {
        return $this->belongsTo(Usuario::class, 'chofer_id');
    }

    /**
     * Obtiene el vehículo asociado al ride.
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    /**
     * Obtiene todas las reservas para este ride.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ride_id');
    }
}

