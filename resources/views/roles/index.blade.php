@extends('layouts.dashboard.index', ['activePage' => 'roles', 'titlePage' => 'Roles'])
@section('main-content')
<div class="d-flex justify-content-between">
  <h2>
      ROLES 
  </h2>
  @can('role_create')
  <a href="{{ route('roles.create') }}" type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%">Crear Rol</a>
  @endcan
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
  @can('role_buscar')
  <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
      <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
      <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
  </span>
  @endcan
</div>
<div style="margin-top: 1%" class="table-responsive" >
<table class="table" id="roles" >
  <thead>
      <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Guard</th>
          <th scope="col">Created_at</th>
          <th scope="col">Permisos</th>
          <th scope="col">Acciones</th>
      </tr>
  </thead>
  <tbody> 
      @forelse ($roles as $role)
      <tr scope="row">
          <td>{{ @$role->id }}</td>
          <td>{{ @$role->name }}</td>
          <td>{{ @$role->guard_name }}</td>
          <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                    <td>
                      @forelse ($role->permissions as $permission)
                          <span class="badge badge-info">{{ $permission->name }}</span>
                      @empty
                          <span class="badge badge-danger">No permission added</span>
                      @endforelse
                    </td>
          
          <td>
            @can('role_edit')
              <a type="button" class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}" >
                  Editar
              </a>
            @endcan
            @can('role_destroy')
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$role->id}}">
              Eliminar
              </button>
            @endcan
          </td> 
      </tr>
      @include('roles.modalEliminar')
      @empty
          No existen roles registrados

      @endforelse
  </tbody>
</table>
</div> 
<script language="javascript">
  function doSearch() {
      var tableReg = document.getElementById('roles');
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection
