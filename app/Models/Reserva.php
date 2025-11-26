<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'pasajero_id',
        'ride_id',
        'espacios_solicitados',
        'estado',
    ];

    // --- RELACIONES ---

    /**
     * Obtiene el usuario (pasajero) que hizo la reserva.
     */
    public function pasajero()
    {
        return $this->belongsTo(Usuario::class, 'pasajero_id');
    }

    /**
     * Obtiene el ride al que pertenece la reserva.
     */
    public function ride()
    {
        return $this->belongsTo(Ride::class, 'ride_id');
    }
}
