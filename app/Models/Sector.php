<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $table = 'sectors';
    protected $fillable = ['nombre'];
    public function aulas()
    {
        return $this->hasMany(Aula::class);
    }
}
