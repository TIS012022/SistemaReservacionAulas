@extends('layouts.dashboard.index')
@section('main-content')


@if ($tipo === 'reservadas')
<h2>Mis solicitudes</h2>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numero Aula</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Materia</th>
            <th scope="col">Dia de reserva</th>
            <th scope="col">Horario de reserva</th>
            <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aulas as $aula)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$aula->num_aula }}</td>
            <td>{{ @$aula->capacidad }}</td>
            <td>{{ @$aula->codigo }} - {{ @$aula->nombre }}</td>
            <td>{{ @$aula->dia }}</td>
            <td>{{ @$aula->hora_ini }} - {{ @$aula->hora_fin }}</td>
            <td>{{ @$aula->estado }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h2>
    Aulas
   
</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrear">
    Crear aula
</button>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numero Aula</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Sector</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aulas as $aula)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$aula->num_aula }}</td>
            <td>{{ @$aula->capacidad }}</td>
            <td>{{ @$aula->sector }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade bs-example-modal-lg" id="modalCrear">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Categoría</label>
                        <input type="text" name="name" class="form-control" id="category">
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>   
</div>

@endif

@endsection