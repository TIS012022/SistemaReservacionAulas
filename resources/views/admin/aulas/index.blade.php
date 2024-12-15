@extends('layouts.dashboard.index')
@section('main-content')


@if ($tipo === 'reservadas')
<h2>INFORMACIÓN DE AULAS RESERVADAS</h2>

<div class="form-group">
    <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
        <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
        <input id="searchTerm" type="text" onkeyup="doSearch2()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
    </span>
</div>
<table class="table" id="aulasR2">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numero Aula</th> 
            <th scope="col">Materia</th>
            <th scope="col">Dia de reserva</th>
            <th scope="col">Horario de reserva</th>
            <th scope="col">Horario fin reserva</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($aulas as $aula) 
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$aula->num_aula }}</td>
            <td>{{ @$aula->nombre }}</td>
            <td>{{ @$aula->dia }}</td>

            <td>{{ @$aula->hora_ini }} </td>
            <td>{{ @$aula->hora_fin }}</td>
            

        </tr>
        @endforeach
    </tbody>
</table>
@else

<div class="d-flex justify-content-between">
    <h2>
        AULAS 
    </h2>
    @can('aula_create')
    <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalCrear">
        Crear aula
    </button>
    @endcan
</div>
<div style="margin-top: 1%; display: flex; justify-content: center;">
    @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif 
</div>

<!--Tabla de AULAS-->
<div class="form-group">
    @can('aula_buscar')
    <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
        <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
        <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
    </span>
    @endcan
</div>
<div style="margin-top: 1%" class="table-responsive" >
<table class="table" id="aulas" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numero Aula</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Sector</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody> 
        @foreach ($aulas as $aula)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$aula->num_aula }}</td>
            <td>{{ @$aula->capacidad }}</td>
            <td>{{ @$aula->nombre }}</td>
            <td>
                @if(@$aula->estado == 'Habilitado' )
                    <span class="badge badge-success">{{ @$aula->estado }}</span>

                @elseif(@$aula->estado == 'Deshabilitado' )
                    <span class="badge badge-danger">{{ @$aula->estado }}</span>

                @elseif(@$aula->estado == 'Mantenimiento' )
                     <span class="badge badge-warning">{{ @$aula->estado }}</span>
                @endif
            </td>

            

            <td>
                @can('aula_edit')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$aula->id}}">
                    Editar
                </button>
                @endcan
                @can('aula_destroy')
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$aula->id}}">
                    Eliminar
                </button>
                @endcan
            </td> 
        </tr>
        @include('admin.aulas.modalEditar')
        @include('admin.aulas.modalEliminar')
        @endforeach
    </tbody>
</table>
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
<div class="modal fade bs-example-modal-lg" id="modalCrear">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">Nueva Aula</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('admin.aulas.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" value="{{old('codigo')}}" required minlength="5" maxlength="15"  
                        onkeypress="return blockNoNumber(event)">
                        @if ($errors->has('codigo'))
                    <span class="error text-danger" for="input-codigo" style="font-size: 15px">{{ $errors->first('codigo') }}</span>
                    @endif
                        <label for="num_aula">Numero aula</label>
                        <input type="text" name="num_aula" class="form-control" id="num_aula" value="{{old('num_aula')}}" required minlength="1" maxlength="6" 
                        onkeypress="return blockSpecialChar(event)">
                        @if ($errors->has('num_aula'))
                    <span class="error text-danger" for="input-num_aula" style="font-size: 15px">{{ $errors->first('num_aula') }}</span>
                    @endif
                        <label for="capacidad">Capacidad</label>
                        <input type="text" name="capacidad" class="form-control" id="capacidad" value="{{old('capacidad')}}" required minlength="1" maxlength="3"
                        onkeypress="return blockNoNumber(event)">
                        <label for="sectores">Sector</label>
                        <select name="sector" id="sector" class="form-control" value="{{old('sector')}}" required>
                            <option value="">-- Selecciona el sector--</option>
                            
                            @foreach ($sector as $item)
                                <option value="{{ $item->id }}" @if(old('sector') == $item->id) selected @endif>{{ $item->nombre}}</option>
                            @endforeach
                        </select>  
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" value="{{old('sector')}}" required>
                            <option value="">-- Selecciona el estado--</option>
                            
                            <option value="Habilitado" @if(old('estado') == 'Habilitado') selected @endif>Habilitado</option>
                            <option value="Deshabilitado" @if(old('estado') == 'Deshabilitado') selected @endif>Deshabilitado</option>
                            <option value="Mantenimiento" @if(old('estado') == 'Mantenimiento') selected @endif>Mantenimiento</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="refresh">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>   
</div>


<script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }
    function blockNoNumber(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ( (k >= 48 && k <= 57));
        }
    let refresh = document.getElementById('refresh');
    refresh.addEventListener('click', _ => {
            location.reload();
})
</script>
@endif
<script language="javascript">
            function doSearch() {
                var tableReg = document.getElementById('aulas');
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

<script language="javascript">
            function doSearch2() {
                var tableReg = document.getElementById('aulasR2');
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
@endsection