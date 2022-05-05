<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tipo === "reservadas") {
            $aulas = DB::table('solicitudes')
            ->join('materias', 'solicitudes.materia', '=', 'materias.id')
            ->join('aulas', 'solicitudes.aula', '=', 'aulas.id')
            ->where('solicitudes.docente', Auth::id())
            ->get();
            return view('admin.aulas.index', compact('aulas'))->with('tipo', "reservadas");
        }
        $aulas = Aula::orderBy('id', 'asc')->get();
        return view('admin.aulas.index', compact('aulas'))->with('tipo', "all");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
            $newAula= new Aula();
    
            $newAula->codigo = $request->codigo;
            $newAula->num_aula = $request->num_aula;
            $newAula->capacidad = $request->capacidad;
            $newAula->sector = $request->sector;
            $newAula->estado = $request->estado;
            $newAula->save();

        
           return redirect()->back();        
    }

    public function delete(Request $request, $aulaId)
    {
        $aula = Aula::find($aulaId);
        $aula->delete();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function show(Aula $aula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function edit(Aula $aula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aula $aula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aula $aula)
    {
        //
    }
}
