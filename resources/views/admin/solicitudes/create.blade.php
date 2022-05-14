
@extends('layouts.dashboard.index')
@section('main-content')
<?php
  
?>
    <div class="container">
        <div class="my-6">
            <div class="card">
                <div class="card-header">
                  Nueva Solicitud
                </div>
                <div class="card-body">
                    <form action="{{route('solicitudes.store')}}" method="POST">
                    @csrf
                        <div class="card-bady">
                            {{-- @if($errors->any())
                                <div class="alert alert-primary">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                             --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Nombre Materia:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button">M</button>
                                                    <select name="docmateria_id" id="docmateria_id" class="custom-select" value="{{old('materia')}}" >
                                                        <option selected>Seleccione Materia..</option>
                                                        @foreach ($materiaUnidas as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre}}--Grupo {{$item->numero}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                        </div>           
                                    </div>
                                </div>
                               {{--
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Grupo:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group">
                                                <button class="btn btn-primary" type="button" >G</button>
                                                
                                                {{-- <input name="grupo_id" type="name" class="form-control" placeholder="Grupo"> 
                                                <select name="grupo" id="grupo" class="custom-select" >
                                                    <option selected>Seleccione N° grupo..</option>
                                                    @foreach ($grupoUnidas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->numero}}</option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </div>        
                                    </div>
                                </div>
                                 --}}
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Cantidad Estudiantes*:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group">
                                                <button class="btn btn-primary" type="button">C</button>
                                                <input name="cantidad" type="name" class="form-control" placeholder="Cantidad-Estudiantes" value="{{old('cantidad')}}">
                                            </span>
                                            <br>      
                                                @if($errors -> has('cantidad'))
                                                    <span class="error-danger" for="input-name">{{$errors->first('cantidad')}}</span>
                                                @endif
                                        </div>         
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                         <label for="name" class="form-control-label">
                                                Numero de Aula:
                                         </label>
                                            <div class="input-group">
                                         <span class="input-group">
                                            <button class="btn btn-primary" type="button">A</button>
                                            {{-- <input name="aula" type="name" class="form-control" placeholder="Aula"> --}}
                                            <select name="aula" class="custom-select">
                                                <option selected>Seleccione N° Aula..</option>
                                                @foreach ($aulas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->num_aula}}</option>
                                                @endforeach
                                            </select>
                                          </span>
                                        </div>            
                                     </div>
                                 </div>
                                 
                                 <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Horario ini:
                                        </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                <button class="btn btn-primary" type="button">H</button>
                                                {{-- <input type="date" id="birthday" name="hora_ini" class="form-control"> --}}
                                               
                                                <select name="hora_ini" id="hora_ini" class="form-control" required>
                                                </span>
                                                    <option value="">-- Selecciona la hora para la solicitud--</option>
                                                    
                                                    <option>6:45</option>
                                                    <option>8:15</option>
                                                    <option >9:45</option>
                                                    <option >11:15</option>
                                                    <option>12:45</option>
                                                    <option>14:15</option>
                                                    <option >15:45</option>
                                                    <option >17:15</option>
                                                    <option>18:45</option>
                                                    <option>20:15</option>
                                                    <option >21:45</option>                           
                                                </select>   
                                            </div>               
                                        </div>
                                  </div>

                                 

                                   <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Dia Reserva:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                <button class="btn btn-primary" type="button">D</button>
                                                <input name="dia" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{old('dia')}}">
                                                </span>
                                                <br>      
                                                @if($errors -> has('dia'))
                                                    <span class="error-danger" for="input-name">{{$errors->first('dia')}}</span>
                                                @endif
                                            </div>                        
                                        </div>
                                   </div>

                                   <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                    Periodo Reserva*:
                                            </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-primary" type="button">P</button>
                                                    <select name="periodo" id="periodo" class="form-control" required>
                                                    </span>
                                                        <option value="">-- Selecciona los periodos requeridos--</option>
                                                        
                                                        <option>2</option>
                                                        <option>4</option>
                                                          
                                                    </select>  
                                                </div>                             
                                        </div>
                                    </div>
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Motivo*:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-primary" type="button">M</button>
                                                    {{-- <input name="motivo" type="text" class="form-control" aria-label="With textarea"> --}}
                                                    <textarea name="motivo" type="text" class="form-control" id=""  placeholder="Motivo" >{{old('motivo')}}</textarea>
                                                    </span>
                                                    <br>      
                                                    @if($errors -> has('motivo'))
                                                        <span class="error-danger" for="input-name">{{$errors->first('motivo')}}</span>
                                                    @endif
                                                </div>                              
                                            </div>
                                    </div>
                                            <div class="col-md-offset-4 col-md-10 text-center mt-3">
                                                <button type="submit" class="btn btn-primary">enviar</button>
                                                <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
                                            </div>
                               </div>
                           </div>
                      </form>
                 </div>
             </div> 
        </div>
    </div>
<script>
    var fecha = new Date();
var anio = fecha.getFullYear();
var dia = fecha.getDate();
var _mes = fecha.getMonth(); //viene con valores de 0 al 11
_mes = _mes + 1; //ahora lo tienes de 1 al 12
if (_mes < 10) //ahora le agregas un 0 para el formato date
{
  var mes = "0" + _mes;
} else {
  var mes = _mes.toString;
}

let fecha_minimo = anio + '-' + mes + '-' + dia; // Nueva variable

document.getElementById("fechaReserva").setAttribute('min',fecha_minimo);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('script')
    <script>
        
        $(document).ready(function()){
            $('$materia').on('change', function(){
                var materia_id = $(this).val();
                if($.trim(materia_id) != ''){
                    $.get('grupos', {materia_id: materia_id}, function(grupos) {
                        $('#grupo').empty();
                        $('#grupo').append("<option value=''>Selecciona un grupo</option>");
                        $.each(grupos, function(index, value){
                            $('#grupo').append("<option value='"+ index + "'>"+ value +"</option>");

                        })
                    }
                    );
                }
            })
        }
    
    </script>
@endsection