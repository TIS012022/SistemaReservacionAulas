<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsuariosRController extends Controller
{
    //
    public function index()
    {
        $usuarios = DB::table('users')
        ->join('roles', 'users.role', '=', 'roles.id')
        ->select('users.*','roles.rol')
        ->get();
        return view('admin.usuarios.index', ['usuarios' => $usuarios]);
    }
}
