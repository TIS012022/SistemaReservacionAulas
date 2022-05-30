<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materias = Materia::orderBy('id', 'asc')->get();
        return view('admin.materias.index', compact('materias'))->with('tipo', "all");
    }

    public function UpdateStatusNoti(Request $request){ 

        $NotiUpdate = Materia::find($request->id);/* ->update(['estatus' => $request->estatus]) */
        $NotiUpdate ->estado=$request->estatus;

        $NotiUpdate->save();
        if($NotiUpdate){
            $NotiUpdate=Materia::find($request->id);
            if($NotiUpdate->estado == 'Deshabilitado')  {
                        $newStatus = '<span class="badge badge-danger">'.@$NotiUpdate->estado.'</span>';
                    }else{
                        $newStatus ='<span class="badge badge-success">'.@$NotiUpdate->estado.'</span>';
                    }
                    return response()->json(['var'=>''.$newStatus.'']);
        }
        
        return response()->json([],401);

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
        $validator = Validator::make($request->all(),[
            'codigo' => 'required|unique:materias,codigo',
            'nombre' => 'required|string|max:255|unique:materias,nombre',          
            'carrera' => 'required|string|min:1|max:255',
            'tipo' => 'required',
            'nivel' => 'required'  
        ]);
        
        $newMateria = new Materia();
        
        $newMateria ->codigo = $request->codigo;
        $newMateria->nombre = $request->nombre;
        $newMateria->carrera = $request->carrera;
        $newMateria->tipo = $request->tipo;
        $newMateria->nivel = $request->nivel;
        $newMateria->estado = $request->estado;
        // $newMateria->save();

        $materias = Materia::where('codigo', $request->codigo)->first();
        $materias2 = Materia::where('nombre', $request->nombre)->first();
        //    dd($request->all());
        //    dd($materias2);
       if(empty($materias) && empty($materias2) ){    
            $newMateria->save();
            return redirect()->back();
        }else{ 

            return back()->withErrors([
                'message' => 'Error, El codigo o nombre de la materia ya esta registrado en la lista'
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $materiaId)
    {
        $materia = Materia::find($materiaId);
        
        $materia->nombre = $request->nombre;
        $materia->carrera = $request->carrera;
        $materia->tipo = $request->tipo;
        $materia->nivel = $request->nivel;
        //$materia->estado = $request->estado;
        $materia->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
