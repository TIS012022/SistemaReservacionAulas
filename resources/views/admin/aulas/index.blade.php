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
<table class="table" id="aulas">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numero Aula</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Sector</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aulas as $aula)
        <tr scope="row">
            <td>{{ @$aula->id }}</td>
            <td>{{ @$aula->num_aula }}</td>
            <td>{{ @$aula->capacidad }}</td>
            <td>{{ @$aula->sector }}</td>
            <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="">
                    Editar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="modal fade bs-example-modal-lg" id="modalCrear">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Crear Aula</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
            </div>
            <form action="{{route('admin.aulas.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Codigo</label>
                        <input type="text" name="codigo" class="form-control" id="codigo">
                        <label for="name">Numero aula</label>
                        <input type="text" name="num_aula" class="form-control" id="num_aula">
                        <label for="name">Capacidad</label>
                        <input type="text" name="capacidad" class="form-control" id="capacidad">
                        <label for="name">Sector</label>
                        <input type="text" name="sector" class="form-control" id="sector">
                        <label for="name">estado</label>
                        <input type="text" name="estado" class="form-control" id="estado">
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

<script>
$(document).ready(function() {
    $('#aulas').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
@endsection