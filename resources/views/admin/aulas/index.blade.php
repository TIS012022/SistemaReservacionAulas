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
<h2>Aulas</h2>

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

@endif

@endsection