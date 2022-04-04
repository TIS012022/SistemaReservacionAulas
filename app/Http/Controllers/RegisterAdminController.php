<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterAdminController extends Controller
{
    public function create(){
        return view('admin.registerAdmin');
    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'ci' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',

        ]);

        $user = User::create(request(['name','ci','email','password']));

        auth()->login($user);
        return redirect()->to('/');
    }
}
