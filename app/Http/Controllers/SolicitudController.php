<?php

namespace App\Http\Controllers;
use Log;
use App\Models\Aula;
use App\Models\Sector;
use App\Models\Docmateria;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate; 
use Illuminate\Validation\Validator;
use App\Http\Requests\SolicitudCreateRequest;

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
        abort_if(Gate::denies('solicitud_index'), 403);
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
        abort_if(Gate::denies('crear_reserva'), 403);

        $aulas = DB::table('aulas')
        ->where('estado','=','Habilitado')
        ->get();
        $grupos = Grupo::all();
        $materias = Materia::all();
        $sectores = Sector::all();
        $docmaterias = Docmateria::all();
        $materiaUnidas = DB::table('docmaterias')
    
        ->join('materias', 'docmaterias.materia', '=', 'materias.id')
        ->join('grupos', 'docmaterias.grupo', '=', 'grupos.id')
        ->where('docmaterias.estado', '=', 'Habilitado')
        ->where('docmaterias.docente', '=', Auth::id())
        ->select('docmaterias.*', 'materias.nombre', 'grupos.numero')
        ->get();
       
        $grupoUnidas = DB::table( 'grupos')
        ->join('docmaterias', 'grupos.id', '=', 'docmaterias.grupo')
        ->select('grupos.*')    
        ->where('docmaterias.docente', '=', Auth::id())
        ->get();
        //dd($materiaUnidas);
       return view('admin.solicitudes.create',compact('aulas','grupos', 'materias', 'materiaUnidas', 'grupoUnidas','sectores'));
        
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
       /* $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) {
                    if ($value === 'foo') {
                        $fail($attribute.' is invalid.');
                    }
                },
            ],
        ]);*/
        $docmaterias = Docmateria::all();
       
        
        $solicitud = new Solicitud($request->all());
      
    
        $solicitud -> estado = "pendiente";
        $id = $request->aula;
      
        $cantidad = DB::table('aulas')
            ->where('id', $id)
            ->first();
      
        if(($request->cantidad)>($cantidad->capacidad)){
            return back()->withInput($request->all())->withErrors([
                'message' => 'La cantidad excede la capacidad del aula'
            ]);
         
        }else{
           if(strtotime($request->hora_ini)>=strtotime($request->hora_fin)){
            return back()->withInput()->withErrors([
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
        /*abort_if(Gate::denies('solicitud_aceptar'), 403);
        abort_if(Gate::denies('solicitud_rechazar'), 403);
        abort_if(Gate::denies('solicitud_sugerir'), 403);*/
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
    public function getCantidades(Request $request){ 
      
      //  $solicitudes = Solicitud::where('aula', $aulaId)->first(); 
        if($request->ajax()){                   
           $cantidades = Docmateria::where('id', $request->docmateria_id)->first();
            //$cantidades = '5';
           
            return response()->json($cantidades);
        }
        
     }
    
     public function getAulas (Request $request){ 
      
       
        
          if($request->ajax()){      
             
             $aulas = DB::table('aulas')
             ->where('sector', $request->sector_id)
             ->where('estado','=','Habilitado')
             ->get();
             $datos = DB::table('aulas')
             ->where('sector', $request->sector_id)
             ->where('estado','=','Habilitado')
             ->count();
           //  Aula::where('sector', $request->sector_id)->where('estado','=','Habilitado')>get();   
           if($datos == 0)  {   
                 $aulasArray =  [
                0=> "1",
         
                ];
            return response()->json($aulasArray);            
                 
            }else{
                foreach($aulas as $aula){
                    $aulasArray[$aula->id] = $aula->num_aula;
                }
                return response()->json($aulasArray);    
            }                
                   
            
          }
          
       }
}
