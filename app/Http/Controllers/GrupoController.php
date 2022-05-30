<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $grupos = DB::table('grupos')
     //->join('users', 'docmaterias.docente', '=', 'users.id')
     //->join('materias', 'docmaterias.materia', '=', 'materias.id')
     //->join('grupos', 'docmaterias.grupo', '=', 'grupos.id')
     //->select('grupos.*')
     ->get();
    
      return view('admin.grupos.index', compact('grupos'));
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
        $newGrupo= new Grupo();
    
        $newGrupo->codigo = $request->codigo;
        $newGrupo->numero = $request->numero;
       
        $grupoCod = Grupo::where('codigo', $request->codigo)->first();
        $grupoNum = Grupo::where('numero', $request->numero)->first();

        if($grupoCod != $grupoNum){


        }

        $newGrupo->save();

    
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $grupoId)
    {
        $grupo = Grupo::find($grupoId);

        $grupo->codigo = $request->codigo;
        $grupo->numero = $request->numero;
        $grupo->save();

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $grupoId)
    {
        $grupo = Grupo::find($grupoId);
        $grupo->delete();
        return redirect()->back();
    }
}
