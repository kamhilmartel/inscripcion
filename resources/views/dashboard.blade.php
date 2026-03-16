@extends('layouts.admin-institucional')

@section('title', 'Panel Administrativo')

@section('content')
    <div class="section-title">Panel administrativo</div>

    <section class="panel">
        <h3>Gestión general del diplomado</h3>
        <p>
            Desde este panel podrás supervisar el proceso de inscripción, validar participantes,
            registrar alumnos y controlar pagos del diplomado.
        </p>
    </section>

    <div class="stats" style="margin-bottom:24px;">
        <div class="stat-card">
            <span>Total de inscripciones</span>
            <strong>{{ $totalInscripciones ?? 0 }}</strong>
        </div>
        <div class="stat-card">
            <span>Total de alumnos</span>
            <strong>{{ $totalAlumnos ?? 0 }}</strong>
        </div>
        <div class="stat-card">
            <span>Pagos pendientes</span>
            <strong>{{ $pagosPendientes ?? 0 }}</strong>
        </div>
        <div class="stat-card">
            <span>Pagos pagados</span>
            <strong>{{ $pagosPagados ?? 0 }}</strong>
        </div>
    </div>

    <section class="panel">
        <h3>Accesos rápidos</h3>
        <div class="quick-grid" style="margin-top:18px;">
            <div class="quick-card">
                <h4>Inscripciones</h4>
                <p>Revise solicitudes, valide vouchers y cambie el estado de cada registro.</p>
                <a href="{{ route('admin.inscripciones.index') }}" class="btn-primary">Ir a inscripciones</a>
            </div>

            <div class="quick-card">
                <h4>Alumnos</h4>
                <p>Consulte el listado de alumnos aprobados y su situación académica y financiera.</p>
                <a href="{{ route('admin.alumnos.index') }}" class="btn-primary">Ir a alumnos</a>
            </div>

            <div class="quick-card">
                <h4>Pagos</h4>
                <p>Administre matrículas, pensiones, cuotas y el historial de pagos de cada alumno.</p>
                <a href="{{ route('admin.pagos.index') }}" class="btn-primary">Ir a pagos</a>
            </div>
        </div>
    </section>

    <section class="panel">
        <h3>Flujo recomendado del sistema</h3>
        <p>
            Primero el participante llena la ficha de inscripción. Luego el administrador revisa el voucher
            y valida u observa el registro. Después el inscrito aprobado pasa a la sección de alumnos.
            Finalmente se registran sus pagos, cuotas o pensiones correspondientes.
        </p>
    </section>
@endsection