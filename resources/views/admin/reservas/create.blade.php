
@extends('layouts.cms.app')
@section('content')
    <div class="container">
        <div class="my-5">
            <div class="card">
                <div class="card-header">
                  Nueva Solicitud
                </div>
                <div class="card-body">
                    <form action="{{ route('reservas.store') }}" method="POST">
                        @csrf
                        <div class="col">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Nombre Docente:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="nombre_docente" type="name" class="form-control" placeholder="Nombre docente">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                           Nombre Materia:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="materia" type="text" class="form-control" placeholder="Materia">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Grupo:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="grupo" type="text" class="form-control" placeholder="Grupo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Aula:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="aula" type="text" class="form-control" placeholder="Aula">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Cantidad:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="aula" type="text" class="form-control" placeholder="Cantidad">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Motivo:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="aula" type="text" class="form-control" placeholder="Motivo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Hora-ini:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="aula" type="text" class="form-control" placeholder="Hora-ini">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Hora-fin:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="aula" type="text" class="form-control" placeholder="Hora-fin">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Periodo:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="aula" type="text" class="form-control" placeholder=" Periodo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-3 form-control-label text-right">
                                            Dia:
                                        </label>
                                        <div class="col-md-8">
                                            <input name="aula" type="text" class="form-control" placeholder=" Dia">
                                        </div>
                                    </div>
                                </div> --}}
                                
                                <div class="col-md-offset-4 col-md-10 text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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