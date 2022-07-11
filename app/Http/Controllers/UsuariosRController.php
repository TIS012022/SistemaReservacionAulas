<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Docmateria;

use App\Models\Solicitud;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;    
use Spatie\Permission\Models\Role;

class UsuariosRController extends Controller
{
    //
    public function index()
    {
        abort_if(Gate::denies('user_index'), 403);
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    
    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.usuarios.create', compact('roles'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('admin.usuarios.edit', compact('user', 'roles'));
    }

    public function store(UserCreateRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|min:3|max:5',
        //     'username' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required'
        // ]);
        $user = User::create($request->only('name', 'ci', 'email','Departamento', 'password')
            + [
                'estadoCuenta' => "Habilitado",
            ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('admin.usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
    }

    public function delete(Request $request, $usuarioId)
    {
        
        $usuario = User::find($usuarioId);
        
        $usuario->delete();
        return redirect()->back();
    }
    
    public function update(UserEditRequest $request, User $user)
    {
        // $user=User::findOrFail($id);
        $data = $request->only('name', 'email', 'Departamento', 'estadoCuenta');
        $password=$request->input('password');
        if($password)
            $data['password'] = $password;
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $user->update($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('admin.usuarios.index', $user->id)->with('success', 'Usuario actualizado correctamente');
    }
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_destroy'), 403);
        $docmateria = DB::table('docmaterias')
        ->join('users', 'docmaterias.docente', 'users.id')
        ->join('solicitudes', 'docmaterias.id', 'solicitudes.docmateria_id')
        ->where('docmaterias.docente','=', $user->id)
        ->get();
   
//    dd($docmateria);
   


        //dd($interseccion);
     //  dd($solicitudes);
  
        if (auth()->user()->id == $user->id) {
            return redirect()->route('admin.usuarios.index');
        }else{
            if(sizeof($docmateria) == 0){
               // dd("hola");
                $user->delete();
                return back()->with('succes', 'Usuario eliminado correctamente');
                
            }else{
               // dd("hola2");
                return back()->withErrors([
                    'message' => 'No se pudo eliminar el usuario, ya que este tiene solicitudes o reservas pendientes'
                ]);
            }
        }
                   

    }
}
