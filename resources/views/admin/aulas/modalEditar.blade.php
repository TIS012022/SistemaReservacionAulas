<?php
    $sectors = DB::table('sectors')->select('nombre')->get();
   $sectores = DB::table('sectors')->select('nombre')->where('id','=', "{$aula->id}")->get();
  // $sectors = array_diff($sectors, $sectores);   
    //$sector = Arr::prepend($sector, "{$aula->nombre}");

    $estado = ["Habilitado","Deshabilitado", "Mantenimiento"];
    $estado = array_diff($estado, array("{$aula->estado}"));   
    $estado = Arr::prepend($estado, "{$aula->estado}");
?>
<div class="modal fade" id="modalEditar-{{$aula->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">Editar Aula</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.aulas.update', $aula->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="num_aula">Numero aula</label>
                        <input type="text" name="num_aula" class="form-control" id="num_aula" value="{{$aula->num_aula}}" value="{{old('num_aula')}}" required minlength="1" maxlength="6" 
                        onkeypress="return blockSpecialChar(event)">
                        @if ($errors->has('num_aula'))
                       <span class="error text-danger" for="input-num_aula" style="font-size: 15px">{{ $errors->first('num_aula') }}</span>
                         @endif
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Capacidad</label>
                        <input type="text" name="capacidad" class="form-control" id="capacidad" value="{{$aula->capacidad}}" value="{{old('capacidad')}}" required minlength="1" maxlength="3"
                        onkeypress="return blockNoNumber(event)">
                    </div>
                    <div class="form-group">
                        <label for="sector">Sector</label>
                        <select name="sector" id="sector" class="form-control" value="{{old('sector')}}"  required>
                            <option value="">--Seleccione Sector--</option>
                            @foreach ($sector as $item)
                             <option value="{{ $item->id}}" @if(old('sector') == $item->id) selected @endif>{{ $item->nombre}}</option>

                            @endforeach
                        </select>                    
                    </div>
                
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" value="{{old('estado')}}"  required>
                            @foreach($estado as $es)
            
                             <option value="{{$es}}" @if(old('estado') ==$es) selected @endif>{{$es}}</option>
            
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
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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