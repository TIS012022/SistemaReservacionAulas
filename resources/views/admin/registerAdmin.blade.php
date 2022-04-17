@extends('layouts.app')

@section('title','registerAdmin')

@section('content')

    <div class ="block mx-auto my-12 p-8 bg-white">

        <h1 class="text-center">Register Admin</h1>
    
        <form class="mt-4" method="POST" action="">
            @csrf

            <input type="text" class="border border-gray-200 focus:bg-white" 
            placeholder="Nombre" id="name" name="name">

            @error('name')
            <p class="border border-red-500">{{$message}}</p>           
            @enderror
    
            <input type="number" class="border border-gray-200 focus:bg-white" 
            placeholder="Carnet de identidad" id="ci" name="ci">

            @error('ci')
            <p class="border border-red-500">{{$message}}</p>           
            @enderror
    
            <input type="email" class="border border-gray-200 focus:bg-white" 
            placeholder="Email" id="email" name="email">

            @error('email')
            <p class="border border-red-500">{{$message}}</p>           
            @enderror
    
            <input type="password" class="border border-gray-200 focus:bg-white" 
            placeholder="Password" id="password" name="password">

            @error('password')
            <p class="border border-red-500">{{$message}}</p>           
            @enderror

            <input type="password" class="border border-gray-200 focus:bg-white" 
            placeholder="Confimacion Password" id="password_confirmation" name="password_confirmation">
            
            <input type="text" class="border border-gray-200 focus:bg-white" 
            placeholder="Tipo de usuario" id="role" name="role">

            @error('role')
            <p class="border border-red-500">{{$message}}</p>           
            @enderror
    
            <button type="submit" class="btn btn-secondary">Send</button>
        </form>
    </div>
@endsection