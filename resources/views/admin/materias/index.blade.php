@extends('layouts.dashboard.index')
@section('main-content')

    <div class="d-flex justify-content-between">
        <h2>
            LISTA DE CREADAS MATERIAS 
        </h2>
        <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalCrear">
            Crear materias
        </button>
    </div>
    <div style="margin-top: 1%; display: flex; justify-content: center;">
        @error('message')
                    
        <p class="alert alert-danger ">{{$message}}</p>
        <button type="button" class="close" onclick="location.reload()" style="margin-bottom: 40px">
            <span aria-hidden="true" >&times;</span></button>  
        
        @enderror 
    </div>

    <!--Tabla de Materias-->
        <div style="margin-top: 1%" class="table-responsive" >
        <table class="table" id="materias" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($materias as $materia)
                <tr scope="row">
                    <td>{{ @$materia->id }}</td>
                    <td>{{ @$materia->nombre}}</td>
                    <td>{{ @$materia->carrera}}</td>
                    <td>{{ @$materia->codigo}}</td>
                    <td>{{ @$materia->nivel}}</td>
                    <td>{{ @$materia->tipo}}</td>
                    <td>
                        @if(@$materia->estado == 'Habilitado' )
                            <span class="badge badge-success">{{ @$materia->estado }}</span>
        
                        @elseif(@$materia->estado == 'Deshabilitado' )
                            <span class="badge badge-danger">{{ @$materia->estado }}</span>
                        @endif
                    </td>

                    <td>
                        
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$materia->id}}">
                                Editar
                            </button>
                         </div>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminar-{{$materia->id}}">
                            Desabilitar
                        </button> --}}
                    </td>
                </tr>

                     @include('admin.materias.modalEditar')
                    {{-- @include('admin.materias.modalEliminar') --}}
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
                    <h4 class="modal-title w-100 text-center">Asignar materia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('admin.materias.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Codigo</label>
                            <input type="text" name="codigo" class="form-control" id="codigo" required minlength="7" maxlength="15"  
                            onkeypress="return blockNoNumber(event)">
                            <label for="name">Nombre Materia</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" required minlength="5" maxlength="22"
                            onkeypress="return blockSpecialChar(event)">
                            <label for="name">Carrera</label>
                            <input type="text" name="carrera" class="form-control" id="carrera" required minlength="5" maxlength="15"
                            onkeypress="return blockSpecialChar(event)">
                            <label for="name">Nivel</label>
                            <input type="text" name="nivel" class="form-control" id="nivel" required minlength="1" maxlength="2" 
                            onkeypress="return blockSpecialChar(event)">
                            <label for="tipo">Tipo Materia</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="">-- Selecciona el tipo de materia--</option>
                                <option>Regular</option>
                                <option>Electiva</option>
                            </select>   
                            
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">-- Selecciona el estado--</option>
                                
                                <option>Habilitado</option>
                                <option>Deshabilitado</option>
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
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32);
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