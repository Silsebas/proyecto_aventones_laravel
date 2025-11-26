<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

// Importante: Usar el Authenticatable para el sistema de login de Laravel
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Cambiamos 'Model' por 'Authenticatable' para que Laravel pueda manejar el login
class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Los atributos que son asignables en masa test.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'fecha_nacimiento',
        'correo',
        'telefono',
        'foto_perfil',
        'password',
        'rol',
        'estado',
        'token_activacion',
    ];

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'token_activacion', // Similar a 'remember_token' de Laravel
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    // --- RELACIONES ---

    /**
     * Obtiene los vehículos que pertenecen al usuario (si es chofer).
     */
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'chofer_id');
    }

    /**
     * Obtiene los rides que el usuario ha creado (si es chofer).
     */
    public function ridesCreados()
    {
        return $this->hasMany(Ride::class, 'chofer_id');
    }

    /**
     * Obtiene las reservas que el usuario ha hecho (si es pasajero).
     */
    public function reservasHechas()
    {
        return $this->hasMany(Reserva::class, 'pasajero_id');
    }
}
