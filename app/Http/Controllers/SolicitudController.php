<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Docmateria;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
        
            ->join('docmaterias', 'solicitudes.docmateria_id', '=', 'docmaterias.id')
            ->join('users', 'docmaterias.docente', '=', 'users.id')
          
           ->join('aulas', 'solicitudes.aula', '=', 'aulas.id')
            // ->join('materias', 'materias.id', '=', 'solicitudes.id')
            
            ->where('solicitudes.estado', '=', 'pendiente')
            // ->join('grupos', 'grupos.id', '=', 'solicitudes.id')
            ->select('name', 'num_aula','solicitudes.*')
            ->get();
          //  dd($solicitudes->all());
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
        
        $aulas = DB::table('aulas')
        ->where('estado','=','Habilitado')
        ->get();
        $grupos = Grupo::all();
        $materias = Materia::all();
        $docmaterias = Docmateria::all();
        $materiaUnidas = DB::table('docmaterias')
    
        ->join('materias', 'docmaterias.materia', '=', 'materias.id')
        ->join('grupos', 'docmaterias.grupo', '=', 'grupos.id')
      
        ->where('docmaterias.docente', '=', Auth::id())
      
        ->get();

        $grupoUnidas = DB::table( 'grupos')
        ->join('docmaterias', 'grupos.id', '=', 'docmaterias.grupo')
        ->select('grupos.*')    
        ->where('docmaterias.docente', '=', Auth::id())
        ->get();
        
        return view('admin.solicitudes.create',compact('aulas','grupos', 'materias', 'materiaUnidas', 'grupoUnidas'));
        
    }

    /**public function getGrupos(Request $request){
            if ($request->ajax()){
                $grupos = Grupo::where('materia_id', $request->materia_id)->get();
                foreach ($grupos as $grupo){
                    $gruposArray[$grupo->id] = $grupo->numero;

                }
                return response()->json($gruposArray);
            }
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        //
        
        $docmaterias = Docmateria::all();
        $request-> validate([
            'cantidad' => 'required|min:1|max:3',
            'periodo' => 'required',
            'motivo' => 'required'
        ]);
        
        $solicitud = new Solicitud($request->all());
      
    
        $solicitud -> estado = "pendiente";
        $id = $request->aula;
      
        $cantidad = DB::table('aulas')
            ->where('id', $id)
            ->first();
           
        if(($request->cantidad)>($cantidad->capacidad)){
            return back()->withErrors([
                'message' => 'La cantidad de requerida excede la capacidad del aula'
            ]);
        }else{
           if(($request->hora_ini)>=($request->hora_fin)){
            return back()->withErrors([
                'message' => 'La hora final es igual o mayor al horario de inicio'
            ]);
           }else{
         
             $solicitud->save();
            //return redirect()->back();   
           }
        }    
     

        
       
     //   dd($request->all()); 
        

    
         
        
        return Redirect()->route('solicitudes.create');

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
    public function select(){ 
        $data=DB::table('docmaterias')
        ->select('inscritos')
        ->get();
         return view('pruebas.select')->with('data',$data);
     }
  
}
