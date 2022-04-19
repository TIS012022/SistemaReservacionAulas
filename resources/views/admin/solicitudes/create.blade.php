
@extends('layouts.dashboard.index')
@section('main-content')
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
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Nombre Materia:
                                        </label>
                                        <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button">M</button>
                                                    {{-- <input name="materia_id" type="name" class="form-control" placeholder="Materia"> --}}
                                                    <select name="materia_id" class="custom-select">
                                                        <option selected>Seleccione Materia..</option>
                                                        @foreach ($materias as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                        </div>           
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Grupo:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group">
                                                <button class="btn btn-primary" type="button">G</button>
                                                {{-- <input name="grupo_id" type="name" class="form-control" placeholder="Grupo"> --}}
                                                <select name="grupo_id" class="custom-select">
                                                    <option selected>Seleccione N° grupo..</option>
                                                    @foreach ($grupos as $item)
                                                        <option value="{{ $item->id }}">{{ $item->numero}}</option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </div>        
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Cantidad Estudiantes:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group">
                                                <button class="btn btn-primary" type="button">C</button>
                                                <input name="cantidad" type="name" class="form-control" placeholder="Cantidad-Estudiantes">
                                            </span>
                                        </div>         
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                         <label for="name" class="form-control-label">
                                                Numero de Aula:
                                         </label>
                                            <div class="input-group">
                                         <span class="input-group">
                                            <button class="btn btn-primary" type="button">A</button>
                                            {{-- <input name="aula" type="name" class="form-control" placeholder="Aula"> --}}
                                            <select name="aula_id" class="custom-select">
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
                                                <input name="hora_ini" type="time" class="form-control" placeholder=" Horario ini">
                                                {{-- <input type="date" id="birthday" name="hora_ini" class="form-control"> --}}
                                                </span>
                                            </div>               
                                        </div>
                                  </div>

                                  <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Horario fin:
                                            </label>
                                            <div class="input-group">
                                            <span class="input-group">
                                                <button class="btn btn-primary" type="button">H</button>
                                                <input name="hora_fin" type="time" class="form-control" placeholder="Horario fin">
                                                {{-- <input type="date" id="birthday" name="hora_fin"> --}}
                                            </span>
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
                                                <input name="dia" type="date" class="form-control" placeholder="Dia Reserva">
                                                </span>
                                            </div>                        
                                        </div>
                                   </div>

                                   <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                    Periodo Reserva:
                                            </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-primary" type="button">P</button>
                                                    <input name="periodo" type="name" class="form-control" placeholder="Periodo reserva">
                                                    </span>
                                                </div>                             
                                        </div>
                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                    Docente:
                                            </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-primary" type="button">D</button>
                                                    <input name="docente_id" type="name" class="form-control" placeholder="N° Docente">
                                                    </span>
                                                </div>                             
                                        </div>
                                    </div> --}}
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Motivo:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-primary" type="button">M</button>
                                                    {{-- <input name="motivo" type="text" class="form-control" aria-label="With textarea"> --}}
                                                    <textarea name="motivo" type="text" class="form-control" id=""  placeholder="Motivo"></textarea>
    
                                                </span>
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
@endsection