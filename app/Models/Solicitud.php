<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';
    protected $fillable = ['cantidad', 
                            'motivo',
                            'hora_ini',
                            'hora_fin',
                            'periodo',
                            'dia',
                            'grupo_id',
                            'aula_id',
                            'materia_id',
                            'docente_id'
                            
    ];
    
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
   
}
