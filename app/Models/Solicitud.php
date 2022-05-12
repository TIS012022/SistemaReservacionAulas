<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Block\Document;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitudes';
    protected $fillable = ['cantidad', 
                            'motivo',
                            'hora_ini',
                            'periodo',
                            'dia',
                            'estado',
                            'aula',
                            'docmateria',
                        
                            
    ];
    
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function docmateria()
    {
        return $this->belongsTo(Docmateria::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
