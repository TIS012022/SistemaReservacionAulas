<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Solicitud;
use App\Models\User;
use App\Models\Docmateria;

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
    
    public function index2()
    {
      $materias = DB::table('materias')->get();
      $grupos = DB::table('grupos')->get();
      $users = DB::table('users')->get();
      $docentesmaterias = DB::table('docmaterias')
     ->join('users', 'docmaterias.docente', '=', 'users.id')
     ->join('materias', 'docmaterias.materia', '=', 'materias.id')
     ->join('grupos', 'docmaterias.grupo', '=', 'grupos.id')
     ->select('materias.nombre','grupos.codigo','users.name', 'docmaterias.*')
     ->get();
    
      return view('admin.docMaterias.index', ['docentesmaterias' => $docentesmaterias,
       'materias' => $materias, 'grupos' => $grupos,'users' => $users]);
    }

    public function store(Request $request)
    {      
            $newAsignacion= new Docmateria();
    
            $newAsignacion->inscritos = $request->inscritos;
            $newAsignacion->gestion = $request->gestion;
            $newAsignacion->estado = $request->estado;
            $newAsignacion->grupo = $request->grupo;
            $newAsignacion->materia = $request->materia;
            $newAsignacion->docente = $request->docente;
            
            $newAsignacion->save();

        
           return redirect()->back();        
    }

    public function update(Request $request, $docmateriaId)
    {
        $asignacion = Docmateria::find($docmateriaId);

        $asignacion->inscritos = $request->inscritos;
        $asignacion->gestion = $request->gestion;
        $asignacion->estado = $request->estado;
        $asignacion->grupo = $request->grupo;
        $asignacion->materia = $request->materia;
        //$asignacion->docente = $request->docente;
        $asignacion->save();

       return redirect()->back();
    }
}