<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Solicitud;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class DocmateriaController extends Controller
{
    //
    public function index()
    {
    $docmaterias = DB::table('docmaterias')
    ->join('users', 'docmaterias.docente', '=', 'users.id')
  //  ->join('users', 'docmaterias.docente', '=', 'users.id')
    // ->join('materias', 'materias.id', '=', 'solicitudes.id')
    ->join('materias', 'docmaterias.materia', '=', 'materias.id')
    ->join('grupos', 'docmaterias.grupo', '=', 'grupos.id')

    // ->join('grupos', 'grupos.id', '=', 'solicitudes.id')
   // ->select('docmaterias.name', 'docmaterias.num_aula','solicitudes.*')
    ->get();

// $solicitudes = solicitud::all(); 
    
        return view('admin.docmateria.index', compact('docmaterias'));
    }
}
