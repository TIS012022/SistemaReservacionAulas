@extends('layouts.dashboard.index', ['activePage' => 'roles', 'titlePage' => 'Roles'])
@section('main-content')
<div class="d-flex justify-content-between">
  <h2>
      ROLES 
  </h2>
  <a href="{{ route('roles.create') }}" class="btn btn-sm btn-facebook">Añadir nuevo rol</a>
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
              <a type="button" class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}" >
                  Editar
              </a>
              <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
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
          No existen roles registrados

      @endforelse
  </tbody>
</table>
</div> 
@endsection
