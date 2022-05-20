@extends('layouts.dashboard.index')
@section('main-content')

<h2>INFORMACIÓN DE USUARIOS</h2>
<div style="margin-top: 1%" class="table-responsive" >
<table class="table" id="usuarios" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Carnet de identidad</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>

            <th scope="col">Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$usuario->name }}</td>
            <td>{{ @$usuario->ci }}</td>
            <td>{{ @$usuario->email }}</td>
            <td>{{ @$usuario->rol}}</td>
        
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="">
                    Eliminar
                </button>
            </td>
            
        </tr>
    

        @endforeach
    </tbody>
</table>
</div>
@endsection