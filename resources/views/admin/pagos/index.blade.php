@extends('layouts.admin-institucional')

@section('title', 'Pagos')

@section('content')
    <div class="section-title">Pagos</div>

    <section class="panel">
        <h3>Listado general</h3>
        <p>Historial de conceptos de pago, cuotas y registros financieros del diplomado.</p>
    </section>

    <section class="panel">
        @if($pagos->count())
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>Fecha vencimiento</th>
                            <th>Fecha pago</th>
                            <th>Estado</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{ $pago->id }}</td>
                                <td>
                                    <strong>{{ $pago->alumno->inscripcion->nombres ?? '' }} {{ $pago->alumno->inscripcion->apellidos ?? '' }}</strong><br>
                                    <small>{{ $pago->alumno->inscripcion->dni ?? 'Sin DNI' }}</small>
                                </td>
                                <td>{{ $pago->concepto }}</td>
                                <td>S/ {{ number_format($pago->monto, 2) }}</td>
                                <td>{{ $pago->fecha_vencimiento ?: 'No definido' }}</td>
                                <td>{{ $pago->fecha_pago ?: 'No registrado' }}</td>
                                <td>
                                    <span class="status status-{{ strtolower($pago->estado) }}">
                                        {{ $pago->estado }}
                                    </span>
                                </td>
                                <td>{{ $pago->observacion ?: 'Sin observaciones' }}</td>
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