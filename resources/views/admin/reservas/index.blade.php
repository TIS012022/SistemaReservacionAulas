@extends('layouts.cms.app')
@section('content')

<div class="container">
    <div class="my-5">
        <h2 class="my-3">RESERVAS</h2>
        <div class="button-create">
            <a href="{{ url('reservas/create') }}">
                <button class="btn btn-primary">Crear</button>
            </a>
        </div>

        <table class="table">
            <thead> 
                
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Docente</th>
                <th scope="col">Materia</th>
                <th scope="col">Grupo</th>
                <th scope="col">Aula</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($reservas as $reserva)
                <tr>
                    <th scope="row">{{ @$reserva->id }}</th>
                    <td>{{ @$reserva->nombre_docente }}</td>
                    <td>{{ @$reserva->materia }}</td>
                    <td>{{ @$reserva->grupo }}</td>
                    <td>{{ @$reserva->aula }}</td>
                    <td>
                        <form action="{{ route('reservas.destroy',$reserva->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <label for="Seleccionar"></label>
       
    </div>
</div>

@endsection