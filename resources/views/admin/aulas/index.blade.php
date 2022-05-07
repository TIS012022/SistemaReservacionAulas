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

<div class="d-flex justify-content-between">
    <h2>
        Aulas  
    </h2>
    <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalCrear">
        Crear aula
    </button>
</div>
<div style="margin-top: 5%" class="table-responsive" >
<table class="table " id="aulas" >
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
            <td>{{ @$aula->id }}</td>
            <td>{{ @$aula->num_aula }}</td>
            <td>{{ @$aula->capacidad }}</td>
            <td>{{ @$aula->sector }}</td>
            <td>{{ @$aula->estado }}</td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$aula->id}}">
                    Editar
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminar">
                    Eliminar
                </button>
            </td>
        </tr>
        @include('admin.aulas.modalEditar')
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
                        <label for="name">Codigo</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" required minlength="5" maxlength="15"  
                        onkeypress="return blockNoNumber(event)">
                        <label for="name">Numero aula</label>
                        <input type="text" name="num_aula" class="form-control" id="num_aula" required minlength="1" maxlength="6" 
                        onkeypress="return blockSpecialChar(event)">
                        <label for="name">Capacidad</label>
                        <input type="text" name="capacidad" class="form-control" id="capacidad" required minlength="1" maxlength="3"
                        onkeypress="return blockNoNumber(event)">
                        <label for="sector">Sector</label>
                        <select name="sector" id="sector" class="form-control" required>
                            <option value="">-- Selecciona el sector--</option>
                            
                            <option>edificio nuevo</option>
                            <option>bloque antiguo</option>
                            <option >laboratorios</option>
                            <option >edificio memi</option>
                        </select>   
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="">-- Selecciona el estado--</option>
                            
                            <option>Deshabilitado</option>
                            <option>Libre</option>
                            <option >Reservado</option>
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

<div class="modal fade bs-example-modal-lg" id="modalEliminar">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center" >Eliminar Aula</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('admin.aulas.delete', $aula->id)}}" method="POST">
                {{ csrf_field() }}
                @method('DELETE')
                <div class="modal-body w-100 text-center">
                    <a>¿Esta seguro que desea eliminar este aula?</a>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
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


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
@endsection