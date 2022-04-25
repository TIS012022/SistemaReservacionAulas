<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $solicitudes = Solicitud::all();
        // return view('admin.reservas.index', compact('solicitudes'));
        $solicitudes = DB::table('solicitudes')
            ->join('users', 'solicitudes.docente', '=', 'users.id')
            // ->join('materias', 'materias.id', '=', 'solicitudes.id')
            ->join('aulas', 'solicitudes.aula', '=', 'aulas.id')
            ->where('solicitudes.estado', '=', 'pendiente')
            // ->join('grupos', 'grupos.id', '=', 'solicitudes.id')
            ->select('users.name', 'aulas.num_aula','solicitudes.*')
            ->get();
        // $solicitudes = solicitud::all(); 
            
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aulas = Aula::all();
        $grupos = Grupo::all();
        $materias = Materia::all();
        return view('admin.solicitudes.create',compact('aulas','grupos', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $solicitud = new Solicitud($request->all());
        $solicitud -> docente = Auth::id();
        $solicitud -> estado = "pendiente";
        //  dd($solicitud);
        $solicitud->save();
        
        return Redirect()->route('notificaciones');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
        $solicitud->fill($request->all());
        $solicitud->save();

        // alert()->success('Producto actualizado correctamente');

        return redirect()->route('admin.solicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
