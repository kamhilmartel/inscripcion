@extends('layouts.admin-institucional')

@section('title', 'Pagos')

@section('content')
    <div class="section-title">Pagos</div>

    <section class="panel">
        <h3>Listado general</h3>
        <p>Control consolidado de matrícula, pensiones y diploma por alumno.</p>
    </section>

    <section class="panel">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                                $conceptos = [
                                    'Matrícula',
                                    'Pensión 1',
                                    'Pensión 2',
                                    'Pensión 3',
                                    'Pensión 4',
                                    'Diploma',
                                ];
                            @endphp

                            <tr>
                                <td>
                                    <strong>{{ $alumno->inscripcion->nombres }} {{ $alumno->inscripcion->apellidos }}</strong><br>
                                    <small>DNI: {{ $alumno->inscripcion->dni }}</small><br>
                                    <small>Código: {{ $alumno->codigo }}</small>
                                </td>

                                @foreach($conceptos as $concepto)
                                    @php $pago = $pagos->get($concepto); @endphp
                                    <td style="min-width:240px;">
                                        @if($pago)
                                            <div style="margin-bottom:8px;">
                                                <strong>S/ {{ number_format($pago->monto, 2) }}</strong>
                                            </div>

                                            <div style="margin-bottom:8px;">
                                                <span class="status status-{{ strtolower($pago->estado) }}">
                                                    {{ $pago->estado }}
                                                </span>
                                            </div>

                                            @if($pago->comprobante)
                                                <div style="margin-bottom:8px;">
                                                    <a href="{{ route('admin.pagos.comprobante', $pago) }}" target="_blank" class="btn-primary">
                                                        Ver voucher
                                                    </a>
                                                </div>
                                            @else
                                                <div style="margin-bottom:8px; font-size:12px; color:#6b7280;">
                                                    Sin voucher
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('admin.pagos.update', $pago) }}" class="form-pago-admin">
                                                @csrf
                                                @method('PATCH')

                                                @if($pago->estado === 'Pagado')
                                                    <div style="margin-bottom:8px; font-size:12px; color:#166534; font-weight:700;">
                                                        Pago bloqueado por validación. Pulse "Editar" para modificar.
                                                    </div>
                                                @endif

                                                <div style="margin-bottom:8px;">
                                                    <select name="estado" style="width:100%;" {{ $pago->estado === 'Pagado' ? 'disabled' : '' }}>
                                                        <option value="Pendiente" {{ $pago->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                        <option value="Pagado" {{ $pago->estado === 'Pagado' ? 'selected' : '' }}>Pagado</option>
                                                        <option value="Vencido" {{ $pago->estado === 'Vencido' ? 'selected' : '' }}>Vencido</option>
                                                        <option value="Exonerado" {{ $pago->estado === 'Exonerado' ? 'selected' : '' }}>Exonerado</option>
                                                    </select>
                                                </div>

                                                <div style="margin-bottom:8px;">
                                                    <input type="date" name="fecha_pago" value="{{ $pago->fecha_pago }}" style="width:100%;" {{ $pago->estado === 'Pagado' ? 'disabled' : '' }}>
                                                </div>

                                                <div style="margin-bottom:8px;">
                                                    <textarea name="observacion" rows="2" style="width:100%; border:1px solid #cfd8e3; border-radius:6px; padding:8px;" {{ $pago->estado === 'Pagado' ? 'disabled' : '' }}>{{ $pago->observacion }}</textarea>
                                                </div>

                                                @if($pago->estado === 'Pagado')
                                                    <button type="button" class="btn-primary btn-editar-pago">Editar</button>
                                                @else
                                                    <button type="submit" class="btn-primary">Guardar</button>
                                                @endif
                                            </form>
                                        @else
                                            -
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty">No hay pagos registrados por el momento.</div>
        @endif
    </section>

    <script>
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-editar-pago')) {
                const form = e.target.closest('.form-pago-admin');
                if (!form) return;

                const campos = form.querySelectorAll('select, input[name="fecha_pago"], textarea[name="observacion"]');
                campos.forEach(campo => campo.disabled = false);

                e.target.remove();

                const botonGuardar = document.createElement('button');
                botonGuardar.type = 'submit';
                botonGuardar.className = 'btn-primary';
                botonGuardar.textContent = 'Guardar';

                form.appendChild(botonGuardar);
            }
        });
    </script>
@endsection