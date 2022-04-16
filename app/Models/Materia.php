<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';
    protected $fillable = ['codigo', 'nombre', 'carrera'];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
