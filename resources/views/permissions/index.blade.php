@extends('layouts.dashboard.index', ['activePage' => 'permissions', 'titlePage' => 'Permisos'])
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        Permisos 
    </h2>
    <a type="button" class="btn btn-dark" style="background-color: #1D3354" href="{{route('permissions.create')}}" >
        Añadir permiso
    </a>
</div>
<div style="margin-top: 1%; display: flex; justify-content: center;">
    @error('message')
                   
    <p class="alert alert-danger ">{{$message}}</p>
    <button type="button" class="close" onclick="location.reload()" style="margin-bottom: 40px">
        <span aria-hidden="true" >&times;</span></button>  
    
    @enderror 
</div>

<!--Tabla de AULAS-->
<div class="form-group">
    <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
        <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
        <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
    </span>
</div>
<div style="margin-top: 1%" class="table-responsive" >
<table class="table" id="aulas" >
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Guard</th>
            <th scope="col">Created_at</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody> 
        @forelse ($permissions as $permission)
        <tr scope="row">
            <td>{{ @$permission->id }}</td>
            <td>{{ @$permission->name }}</td>
            <td>{{ @$permission->guard_name }}</td>
            <td>{{ @$permission->created_at }}</td>
            
            <td>
                <a type="button" class="btn btn-primary" href="{{ route('permissions.edit', $permission->id) }}" >
                    Editar
                </a>
                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                    style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" rel="tooltip">
                      <i class="material-icons">close</i>
                    </button>
                  </form>
            </td> 
        </tr>
        @empty
            No existen permisos registrados

        @endforelse
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
                        <label for="name">Codigo</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" required minlength="5" maxlength="15"  
                        onkeypress="return blockNoNumber(event)">
                        <label for="name">Numero aula</label>
                        <input type="text" name="num_aula" class="form-control" id="num_aula" required minlength="1" maxlength="6" 
                        onkeypress="return blockSpecialChar(event)">
                        <label for="name">Capacidad</label>
                        <input type="text" name="capacidad" class="form-control" id="capacidad" required minlength="1" maxlength="3"
                        onkeypress="return blockNoNumber(event)">
                        <label for="sectores">Sector</label>
                        <select name="sector" id="sector" class="form-control" required>
                            <option value="">-- Selecciona el sector--</option>
                            
                           
                        </select>  
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="">-- Selecciona el estado--</option>
                            
                            <option>Habilitado</option>
                            <option>Deshabilitado</option>
                            <option>Mantenimiento</option>
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
