@extends('layouts.dashboard.index')
@section('main-content')


<div class="d-flex justify-content-between">
    <h2>INFORMACIÓN MATERIAS DE DOCENTES</h2>
    @can('asignar_create')
    <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalAsignarMat">
        Asignar materia
    </button>
    @endcan
</div>
<div style="margin-top: 1%; display: flex; justify-content: center;">
    @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <p>
      @foreach ($errors->all() as $error)
        <a>{{ $error }}</a>
      @endforeach
      </p>
    </div>
    @endif
</div>

<div class="form-group">
    @can('asignar_buscar')
    <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
        <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
        <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
    </span>
    @endcan
</div>

<div style="margin-top: 1%" class="table-responsive" >
<table class="table" id="docentematerias" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Materia</th>   
            <th scope="col">Grupo</th>
            <th scope="col">Estado</th>
            <th scope="col">Docente</th>
            <th scope="col">Inscritos</th>
            <th scope="col">Gestión</th>
            <th scope="col">Acciones</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($docentesmaterias as $docentesmateria)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$docentesmateria->nombre }}</td>
            <td>{{ @$docentesmateria->numero }}</td>
            <td>{{ @$docentesmateria->estado }}</td>
            <td>{{ @$docentesmateria->name }}</td>
            <td>{{ @$docentesmateria->inscritos}}</td>
            <td>{{ @$docentesmateria->gestion}}</td>
            

            <td>
                @can('asignar_edit')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$docentesmateria->id}}">
                    Editar
                </button>
                @endcan
                @can('asignar_destroy')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminar-{{$docentesmateria->id}}">
                    Eliminar
                </button>
                @endcan
            </td>

        </tr>

        @include('admin.docMaterias.modalEditar')
        @include('admin.docMaterias.modalEliminar')
        @endforeach
    </tbody>
</table>
</div>



<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="modal fade bs-example-modal-lg" id="modalAsignarMat">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">Asignación materia/docente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    
            </div>
            
            <form action="{{route('admin.docentesmaterias.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Materia</label>
                        <select name="materia" id="materia" class="form-control" required >
                            @error('materia')
                                <span class="invalid.feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="">-- Selecciona la materia--</option>
                            
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}" @if(old('materia') == $materia->id) selected @endif>
                                    {{ $materia->nombre }}

                                </option>
                            @endforeach
                        </select>
                        <label for="name">Grupo</label>
                        <select  name="grupo" class="form-control" id="grupo" required>
                            <option value="">-- Selecciona el grupo--</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}" @if(old('grupo') == $grupo->id) selected @endif>{{ $grupo->codigo }}-{{ $grupo->numero }}

                                </option>
                            @endforeach
                        </select>
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="">-- Selecciona el estado--</option>
                            <option value="Habilitado" @if(old('estado') == 'Habilitado') selected @endif>Habilitado</option>
                            <option value="Deshabilitado" @if(old('estado') == 'Deshabilitado') selected @endif>Deshabilitado</option>
                        </select>
                        <label for="name">Docente</label>
                        <select  name="docente" class="form-control" id="docente" required>
                            <option value="">-- Selecciona al docente--</option>
                            @foreach ($users as $docente)
                                <option value="{{ $docente->id }}" @if(old('docente') == $docente->id) selected @endif>{{ $docente->name }}

                                </option>
                            @endforeach
                        </select>
                        <label for="name">Inscritos</label>
                        <input type="text" name="inscritos"  value="{{ old('inscritos') }}" class="form-control" id="inscritos" required minlength="2" maxlength="3"  
                        onkeypress="return blockNoNumber(event)">
                        <label for="name">Gestión</label>
                        <input type="text" name="gestion" value="{{ old('gestion') }}" class="form-control" id="gestion" required minlength="5" maxlength="15"  
                        >
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="refresh">Cancelar</button>
                    <button type="submit" class="btn btn-primary" >Aceptar</button>
                </div>
            </form>
        </div>
    </div>   
</div>
<script language="javascript">
    function doSearch() {
        var tableReg = document.getElementById('docentematerias');
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

 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>



@endsection