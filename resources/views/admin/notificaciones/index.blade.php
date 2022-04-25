@extends('layouts.dashboard.index')
@section('main-content')
<h2>LISTA DE NOTIFICACIONES</h2>
<div class="card-body">
    <div class="table-responsive">
        <table class="table caption-top">
            <thead>
                <tr>
                    <th>#</th>
                    <th># Solicitud</th>
                    <th>Materia</th>
                    <th>Aula</th>
                    <th>Dia</th>
                    <th>Horario</th>
                    <th>Mensaje</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notificaciones as $notificacion)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $notificacion->solicitud }}</td>
                    <td>{{ $notificacion->codigo }} - {{ $notificacion->nombre }}</td>
                    <td>{{ $notificacion->num_aula }}</td>
                    <td>{{ $notificacion->dia }}</td>
                    <td>{{ $notificacion->hora_ini }} - {{ $notificacion->hora_fin }}</td>
                    <td>{{ $notificacion->mensaje }}</td>
                    <td>{{ $notificacion->email }}</td>
                    <td><i class="btn btn-primary bi bi-eye-fill" data-bs-toggle="modal" data-bs-target="#modalVer{{$loop->index}}"></i></td>

                    <div class="modal fade" id="modalVer{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Notificacion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <textarea class="form-control" readonly placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$notificacion->mensaje}}</textarea>
                                        <label for="floatingTextarea2">Mensaje</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
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