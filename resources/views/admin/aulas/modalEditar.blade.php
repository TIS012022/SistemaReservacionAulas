<?php
    $sector = ['edificio nuevo', 'bloque antiguo', 'laboratorios', 'edificio memi'];
    $sector = array_diff($sector, array("{$aula->sector}"));   
    $sector = Arr::prepend($sector, "{$aula->sector}");
    
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
                        <input type="text" name="num_aula" class="form-control" id="num_aula" value="{{$aula->num_aula}}" required minlength="1" maxlength="6" 
                        onkeypress="return blockSpecialChar(event)">
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Capacidad</label>
                        <input type="text" name="capacidad" class="form-control" id="capacidad" value="{{$aula->capacidad}}" required minlength="1" maxlength="3"
                        onkeypress="return blockNoNumber(event)">
                    </div>
                    <div class="form-group">
                        <label for="sector">Sector</label>
                        <select name="sector" id="sector" class="form-control" required>
                      
                            @foreach($sector as $s)
            
                             <option value="{{$s}}">{{$s}}</option>
            
                            @endforeach
                        </select>                    
                    </div>
                
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            @foreach($estado as $es)
            
                             <option value="{{$es}}">{{$es}}</option>
            
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