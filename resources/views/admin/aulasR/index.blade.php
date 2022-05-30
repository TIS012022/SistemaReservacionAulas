@extends('layouts.dashboard.index', ['activePage' => 'aulasR', 'titlePage' => 'Aulas Reservadas'])
@section('main-content')


@if ($tipo === 'admin')

    <h2>INFORMACIÓN DE AULAS RESERVADAS</h2>

<div class="form-group">
    @can('aulaR_buscar')
    <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
        <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
        <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
    </span>
    @endcan
</div>
<table class="table table-primary table-striped mt-4" id="aulasR">
    <thead> 
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numero Aula</th>
            <th scope="col">Materia</th>
            <th scope="col">Dia de reserva</th>
            <th scope="col">Horario de reserva</th>
            <th scope="col">Horario fin reserva</th>
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($aulas as $aula)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$aula->num_aula }}</td>
            <td>{{ @$aula->nombre }}</td>
            <td>{{ @$aula->dia }}</td>
            <td>{{ @$aula->hora_ini }}</td>
            <td>{{ @$aula->hora_fin }}</td>
            <td>
                @can('aulaR_destroy')
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarReservas-{{$aula->id}}">
                    Eliminar
                </button>
                @endcan
            </td>
            
        </tr>
        @include('admin.aulasR.modalEliminarReservas')

        @endforeach
    </tbody>
</table>
@endif

<script language="javascript">
            function doSearch() {
                var tableReg = document.getElementById('aulasR');
                var searchText = document.getElementById('searchTerm').value.toLowerCase();
                for (var i = 1; i < tableReg.rows.length; i++) {
                    var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                    var found = false;
                    for (var j = 0; j < cellsOfRow.length && !found; j++) {
                        var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                            found = true;
                        }
                    }
                    if (found) {
                        tableReg.rows[i].style.display = '';
                    } else {
                        tableReg.rows[i].style.display = 'none';
                    }
                }
            }
</script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
@endsection