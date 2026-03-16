@extends('layouts.admin-institucional')

@section('title', 'Alumnos')

@section('content')
    <div class="section-title">Alumnos</div>

    <section class="panel">
        <h3>Listado general</h3>
        <p>Relación de alumnos registrados y validados en el sistema.</p>
    </section>

    <section class="panel">
        @if($alumnos->count())
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>DNI</th>
                            <th>Código</th>
                            <th>Estado académico</th>
                            <th>Estado financiero</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->id }}</td>
                                <td>
                                    <strong>{{ $alumno->inscripcion->nombres ?? '' }} {{ $alumno->inscripcion->apellidos ?? '' }}</strong><br>
                                    <small>{{ $alumno->inscripcion->email ?? 'Sin correo registrado' }}</small>
                                </td>
                                <td>{{ $alumno->inscripcion->dni ?? '' }}</td>
                                <td>{{ $alumno->codigo ?: 'Sin asignar' }}</td>
                                <td>{{ $alumno->estado_academico }}</td>
                                <td>{{ $alumno->estado_financiero }}</td>
                                <td>{{ $alumno->observacion ?: 'Sin observaciones' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty">No hay alumnos registrados todavía.</div>
        @endif
    </section>
@endsection