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
}
