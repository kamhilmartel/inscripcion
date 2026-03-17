@extends('layouts.admin-institucional')

@section('title', 'Pagos')

@section('content')
    <div class="section-title">Pagos</div>

    <section class="panel">
        <h3>Listado general</h3>
        <p>Control consolidado de matrícula, pensiones y diploma por alumno.</p>
    </section>

    <section class="panel">
        @if($alumnos->count())
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Matrícula</th>
                            <th>Pensión 1</th>
                            <th>Pensión 2</th>
                            <th>Pensión 3</th>
                            <th>Pensión 4</th>
                            <th>Diploma</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $alumno)
                            @php
                                $pagos = $alumno->pagos->keyBy('concepto');

                                $matricula = $pagos->get('Matrícula');
                                $p1 = $pagos->get('Pensión 1');
                                $p2 = $pagos->get('Pensión 2');
                                $p3 = $pagos->get('Pensión 3');
                                $p4 = $pagos->get('Pensión 4');
                                $diploma = $pagos->get('Diploma');
                            @endphp

                            <tr>
                                <td>
                                    <strong>{{ $alumno->inscripcion->nombres }} {{ $alumno->inscripcion->apellidos }}</strong><br>
                                    <small>DNI: {{ $alumno->inscripcion->dni }}</small><br>
                                    <small>Código: {{ $alumno->codigo }}</small>
                                </td>

                                <td>{{ $matricula?->estado ?? '-' }}</td>
                                <td>{{ $p1?->estado ?? '-' }}</td>
                                <td>{{ $p2?->estado ?? '-' }}</td>
                                <td>{{ $p3?->estado ?? '-' }}</td>
                                <td>{{ $p4?->estado ?? '-' }}</td>
                                <td>{{ $diploma?->estado ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty">No hay pagos registrados por el momento.</div>
        @endif
    </section>
@endsection