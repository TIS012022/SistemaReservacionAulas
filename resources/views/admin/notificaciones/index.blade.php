@extends('layouts.dashboard.index')
@section('main-content')
  <div class="card mt-3">
      <div class="card-header d-inline-flix">
            <h5>LISTA DE NOTIFICACIONES</h5>
            {{-- <a href="{{url('solicitudes/create') }}"  class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i>
                Generar Solicitud
            </a> --}}
      </div>
   </div>

   <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <a class="navbar-brand">Listar</a>
                    <select class="custom-select">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <a class="navbar-brand">Buscar</a>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table caption-top">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Ménsaje</th>
                        <th>Diá</th>
                        <th>Solicitud</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $item)      
                        
                            <tr>
                                <td>{{$item ->id}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item ->motivo}}</td>
                                <td>{{$item ->dia}}</td>
                                <td>{{$item ->id}}</td>
                                <td><button>Ver</button></td>
                            </tr>
                        @endforeach
                    </tbody>
              </table>
        </div>
    </div>
@endsection