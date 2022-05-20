<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UsuariosRController extends Controller
{
    //
    public function index()
    {
        $roles = DB::table('roles')->get();
        $usuarios = DB::table('users')
        ->join('roles', 'users.role', '=', 'roles.id')
        ->select('users.*','roles.rol')
        ->get();
     //   Crypt::decrypt($usuarios->password);
        return view('admin.usuarios.index', ['usuarios' => $usuarios, 'roles' => $roles]);
    }

    public function store(Request $request)
    {    
     
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'ci' => 'required|unique:users',          
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'Departamento' => 'required',
            'role' => 'required'
        ]);

          //  $request['password'] = Hash::make($request['password']);

            $newUsuario= new User();

            $newUsuario->name = $request->name;
            $newUsuario->ci = $request->ci;
            $newUsuario->email = $request->email;
            $newUsuario->password = $request->password;            ;
            $newUsuario->Departamento = $request->Departamento;
            $newUsuario->role = $request->role;
            $newUsuario ->estadoCuenta = "Habilitado";

            $usuarios = User::where('ci', $request->ci)->first();
            $usuarios2 = User::where('email', $request->email)->first();
             // dd($request->all());
          // dd($usuarios2);
           if(empty($usuarios) && empty($usuarios2) ){    
                $newUsuario->save();
                return redirect()->back();
            }else{ 
                
                return back()->withErrors([
                    'message' => 'No se pudo completar el registro, ci o email ya registrado'
                ]);
            }
           
           return redirect()->back();        
    }

    public function delete(Request $request, $usuarioId)
    {
        
        $usuario = User::find($usuarioId);
        $usuario->delete();
        return redirect()->back();
    }
    
    public function update(Request $request, $usuarioId)
    {
        $usuario = User::find($usuarioId);
        $usuario->name = $request->name;
        $usuario->password = $request->password;
        $usuario->estadoCuenta = $request->estadoCuenta;
        $usuario->Departamento = $request->Departamento;
        $usuario->role = $request->role;
        $usuario->save();

       return redirect()->back();
    }
}
