@extends('layouts.dashboard.index')
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>GRUPOS</h2>
    <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalAsignarMat">
        Nuevo Grupo
    </button>
</div>
<div style="margin-top: 1%; display: flex; justify-content: center;">
    @error('message')
                   
    <p class="alert alert-danger ">{{$message}}</p>
    <button type="button" class="close" onclick="location.reload()" style="margin-bottom: 40px">
        <span aria-hidden="true" >&times;</span></button>  
    
    @enderror 
</div>

<div class="container mt-4" style="margin: 0 auto; text-align: center; ">
<table class="table table-sm" id="tabla-responsives">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Código</th>   
            <th scope="col">Número</th>
            <th scope="col">Acciones</th>
            

        </tr>
    </thead>

    <tbody>
        @foreach ($grupos as $grupo)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$grupo->codigo }}</td>
            <td>{{ @$grupo->numero }}</td>
            

            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$grupo->id}}">
                    Editar
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminar-{{$grupo->id}}">
                    Eliminar
                </button>
            </td>

        </tr>

        @include('admin.grupos.modalEditar')
        @include('admin.grupos.modalEliminar')
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
                <h4 class="modal-title w-100 text-center">Crear Nuevo Grupo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('admin.grupos.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Código</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" required minlength="1" maxlength="4"  
                        onkeypress="return blockNoNumber(event)">
                        <label for="name">Número</label>
                        <input type="text" name="numero" class="form-control" id="numero" required minlength="1" maxlength="2" 
                        onkeypress="return blockSpecialChar(event)">
                       
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
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
@endsection