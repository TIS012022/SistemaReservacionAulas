<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';
    protected $fillable = ['codigo', 'numero'];
    
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}