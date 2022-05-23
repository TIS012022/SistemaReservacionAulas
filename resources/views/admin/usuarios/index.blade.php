@extends('layouts.dashboard.index')
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACIÓN DE USUARIOS 
    </h2>
    <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalCrearUsuario">
        Nuevo usuario
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
<table class="table" id="usuarios" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Carnet de identidad</th>
            <th scope="col">Email</th>
            <th scope="col">Estado</th>
            <th scope="col">Rol</th>

            <th scope="col">Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr scope="row">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ @$usuario->name }}</td>
            <td>{{ @$usuario->ci }}</td>
            <td>{{ @$usuario->email }}</td>
            <td>{{ @$usuario->estadoCuenta }}</td>
            <td>{{ @$usuario->rol}}</td>
        
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$usuario->id}}">
                    Editar
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminar-{{$usuario->id}}">
                    Eliminar
                </button>
                
            </td>
            
        </tr>
    
        @include('admin.usuarios.modalEliminar')
        @include('admin.usuarios.modalEditar')
        @endforeach
    </tbody>
</table>
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <div class="modal fade bs-example-modal-lg" id="modalCrearUsuario">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('admin.usuarios.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" name="name" class="form-control" id="name" required minlength="5" maxlength="15"
                        onkeypress="return blockSpecialChar(event)">
                        <label for="name">Carnet de identidad</label>
                        <input type="text" name="ci" class="form-control" id="ci" required minlength="7" maxlength="10" 
                        onkeypress="return blockNoNumber(event)">
                        <label for="name">Correo electronico</label>
                        <input type="email" name="email" class="form-control" id="email" required minlength="10" maxlength="25">
                        <label for="name">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" required minlength="5" maxlength="15">
                        <label for="name">Departamento</label>
                        <input type="text" name="Departamento" class="form-control" id="Departamento" required minlength="5" maxlength="15"
                        onkeypress="return blockSpecialChar(event)">
                        <label for="roles">Rol</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">-- Selecciona el rol--</option>
                            
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->rol}}</option>
                            @endforeach
            
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