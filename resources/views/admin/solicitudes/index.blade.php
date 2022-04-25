@extends('layouts.dashboard.index')
@section('main-content')

<div class="container">
    <div class="my-5">
        <h2 class="my-3">SOLICITUDES</h2>
        <!-- Button trigger modal -->
        <table class="table table-primary table-striped mt-4">
            <thead>

                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre Docente</th>
                    <th scope="col">Motivos y Detalles</th>
                    <th scope="col">Cantidad Estudiantes</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Hora de reserva</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ @$solicitud->dia }}</td>
                    <td>{{ @$solicitud->name }}</td>
                    <td>{{ @$solicitud->motivo }}</td>
                    <td>{{ @$solicitud->cantidad }}</td>
                    <td>{{ @$solicitud->num_aula }}</td>
                    <td>{{ @$solicitud->hora_ini }} - {{ @$solicitud->hora_fin }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalConfirmacion{{$loop->index}}">
                            Aceptar
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalConfirmacion{{$loop->index}}">
                            Rechazar
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalConfirmacion{{$loop->index}}">
                            Sugerir
                        </button>
                    </td>
                    <div class="modal fade" id="modalConfirmacion{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{route('notificaciones.store')}}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating">
                                            <input type="hidden" name="solicitud" value="{{$solicitud->id}}">
                                            <textarea name="mensaje" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Mensaje de confirmacion</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection