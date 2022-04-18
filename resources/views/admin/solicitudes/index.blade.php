@extends('layouts.dashboard.index')
@section('main-content')

<div class="container">
    <div class="my-5">
        <h2 class="my-3">SOLICITUDES</h2>

        <table class="table table-primary table-striped mt-4">
            <thead"> 
                
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre Docente</th>
                <th scope="col">Motivos y Detalles</th>
                <th scope="col">Cantidad Estudiantes</th>
                <th scope="col">Aula</th>
                <th scope="col">Hora de reserva</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            
             @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ @$solicitud->dia }}</td>
                    <td>{{ @$solicitud->name }}</td>
                    <td>{{ @$solicitud->motivo }}</td>
                    <td>{{ @$solicitud->cantidad }}</td>
                    <td>{{ @$solicitud->num_aula }}</td>
                    <td>{{ @$solicitud->hora_ini }} - {{ @$solicitud->hora_fin }}</td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
        <label for="Seleccionar"></label>
       
    </div>
</div>

@endsection