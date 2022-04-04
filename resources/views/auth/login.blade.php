@extends('layouts.app')

@section('title','Login')

@section('content')

<div class ="block mx-auto my-12 p-8 bg-white">

    <h1 class="text-center">Login</h1>

    <form class="mt-4" method="POST" action="">
        @csrf

        <input type="email" class="border border-gray-200 focus:bg-white" 
        placeholder="Email" id="email" name="email">

        <input type="password" class="border border-gray-200 focus:bg-white" 
        placeholder="Password" id="password" name="password">

        @error('message')

        <p class="border border-red-500">{{$message}}</p>
            
        @enderror

        <button type="submit" class="btn btn-secondary">Send</button>
    </form>
</div>
@endsection