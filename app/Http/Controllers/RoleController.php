<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = DB::table('roles')
        ->get();
        
      // dd($roles);
     //   Crypt::decrypt($usuarios->password);
     return view('admin.roles.index', ['roles' => $roles]);
    }

    public function store(Request $request)
    {      
            $newRole= new Role();
   
            $newRole->rol = $request->rol;
            $newRole->permiso = $request->permiso;

            $newRole->save();

        
           return redirect()->back();        
    }

    public function delete(Request $request, $roleId)
    {
        
        $role = Role::find($roleId);
        $role->delete();
        return redirect()->back();
    }
    
    public function update(Request $request, $roleId)
    {
        $role = Role::find($roleId);
        $role->rol = $request->rol;
        $role->permiso = $request->permiso;

        $role->save();

       return redirect()->back();
    }
}
