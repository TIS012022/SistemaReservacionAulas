@extends('layouts.dashboard.index')
@section('main-content')


<div class="d-flex justify-content-between">
    <h2>INFORMACIÓN MATERIAS DE DOCENTES</h2>
    <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalAsignarMat">
        Asignar materia
    </button>
</div>
<div style="margin-top: 1%; display: flex; justify-content: center;">
    @error('message')
                   
    <p class="alert alert-danger ">{{$message}}</p>
    <button type="button" class="close" onclick="location.reload()" style="margin-bottom: 40px">
        <span aria-hidden="true" >&times;</span></button>  
    
    @enderror 
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$docentesmateria->id}}">
                    Editar
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminar-{{$docentesmateria->id}}">
                    Eliminar
                </button>
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
                                <option value="{{ $materia->id }}" value="{{ old('materia') == $materia->id ? 'selected' : '' }}">
                                    {{ $materia->nombre }}

                                </option>
                            @endforeach
                        </select>
                        <label for="name">Grupo</label>
                        <select  name="grupo" class="form-control" id="grupo" required>
                            <option value="">-- Selecciona el grupo--</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->codigo }}-{{ $grupo->numero }}

                                </option>
                            @endforeach
                        </select>
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="">-- Selecciona el estado--</option>
                            <option>Habilitado</option>
                            <option>Deshabilitado</option>
                        </select>
                        <label for="name">Docente</label>
                        <select  name="docente" class="form-control" id="docente" required>
                            <option value="">-- Selecciona al docente--</option>
                            @foreach ($users as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->name }}

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