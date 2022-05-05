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
                        <input type="text" name="num_aula" class="form-control" id="num_aula" value="{{$aula->num_aula}}">
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Capacidad</label>
                        <input type="text" name="capacidad" class="form-control" id="capacidad" value="{{$aula->capacidad}}">
                    </div>
                    <div class="form-group">
                        <label for="sector">Sector</label>
                        <select name="sector" id="sector" class="form-control" required>
                            <option value="">-- Selecciona el sector--</option>
                            
                            <option>edificio nuevo</option>
                            <option>bloque antiguo</option>
                            <option >laboratorios</option>
                            <option >edificio memi</option>
                        </select>                    
                    </div>
                
                    <div class="form-group">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>