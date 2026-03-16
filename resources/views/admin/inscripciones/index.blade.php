@extends('layouts.admin-institucional')

@section('title', 'Inscripciones')

@section('content')
    <div class="section-title">Inscripciones</div>

    <section class="panel">
        <h3>Listado general</h3>
        <p>Control administrativo de participantes inscritos en el diplomado.</p>
    </section>

    <section class="panel">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($inscripciones->count())
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Participante</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Grado</th>
                            <th>Estado</th>
                            <th>Voucher</th>
                            <th>Actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscripciones as $inscripcion)
                            <tr>
                                <td>{{ $inscripcion->id }}</td>
                                <td>
                                    <strong>{{ $inscripcion->nombres }} {{ $inscripcion->apellidos }}</strong><br>
                                    <small>{{ $inscripcion->email ?: 'Sin correo registrado' }}</small>
                                </td>
                                <td>{{ $inscripcion->dni }}</td>
                                <td>{{ $inscripcion->celular }}</td>
                                <td>{{ $inscripcion->grado_academico }}</td>
                                <td>
                                    <span class="status status-{{ strtolower($inscripcion->estado) }}">
                                        {{ $inscripcion->estado }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ asset('storage/' . $inscripcion->voucher) }}" target="_blank" class="btn-primary">
                                        Ver voucher
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.inscripciones.updateEstado', $inscripcion) }}" class="inline-form">
                                        @csrf
                                        @method('PATCH')
                                        <select name="estado">
                                            <option value="Pendiente" {{ $inscripcion->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="Validada" {{ $inscripcion->estado == 'Validada' ? 'selected' : '' }}>Validada</option>
                                            <option value="Observada" {{ $inscripcion->estado == 'Observada' ? 'selected' : '' }}>Observada</option>
                                        </select>
                                        <button type="submit" class="btn-primary">Guardar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty">No hay inscripciones registradas por el momento.</div>
        @endif
    </section>
@endsection