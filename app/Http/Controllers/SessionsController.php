<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){

        if(auth()->attempt(request(['email','password'])) == false){
            return back()->withErrors([
                'message' => 'El email or password es incorrecto'
            ]);
        }else{
            if( auth()->user()->role == 'admin'){
                return redirect()->route('admin.index');
            }else{
                return redirect()->route('user.index');
            }
        }
    }
    
    public function destroy(){
        auth()->logout();
        
        return redirect()->to('/');
    }
}
