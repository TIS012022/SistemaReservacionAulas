@extends('layouts.dashboard.index', ['activePage' => 'aulas', 'titlePage' => 'Nuevo aula'])
@section('main-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('admin.aulas.store') }}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Aula</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif --}}
              <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" class="form-control" id="codigo" required minlength="5" maxlength="15"  
                onkeypress="return blockNoNumber(event)">
                @if ($errors->has('codigo'))
            <span class="error text-danger" for="input-codigo" style="font-size: 15px">{{ $errors->first('codigo') }}</span>
            @endif
                <label for="num_aula">Numero aula</label>
                <input type="text" name="num_aula" class="form-control" id="num_aula" required minlength="1" maxlength="6" 
                onkeypress="return blockSpecialChar(event)">
                @if ($errors->has('num_aula'))
            <span class="error text-danger" for="input-num_aula" style="font-size: 15px">{{ $errors->first('num_aula') }}</span>
            @endif
                <label for="capacidad">Capacidad</label>
                <input type="text" name="capacidad" class="form-control" id="capacidad" required minlength="1" maxlength="3"
                onkeypress="return blockNoNumber(event)">
                <label for="sectores">Sector</label>
                <select name="sector" id="sector" class="form-control" required>
                    <option value="">-- Selecciona el sector--</option>
                    
                    @foreach ($sectors as $id => $sector)
                        <option value="{{ $sector->id }}">{{ $sector->nombre}}</option>
                    @endforeach
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
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
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
@endsection
