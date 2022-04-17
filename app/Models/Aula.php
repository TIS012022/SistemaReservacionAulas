<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $table = 'aulas';
    protected $fillable = ['num_aula', 'capacidad', 'sector'];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
