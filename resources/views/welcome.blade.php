@extends('layouts.institucional')

@section('title', 'Diplomado')

@section('content')
    <div class="section-title">Paneles informativos</div>

    <div class="panel">
        <div class="cards-3">
            <div class="card-info">
                <img src="{{ asset('panel-nosotros.jpg') }}" alt="Nosotros">
                <div class="overlay">NOSOTROS</div>
            </div>

            <div class="card-info">
                <img src="{{ asset('panel-documentos.jpg') }}" alt="Documentos normativos">
                <div class="overlay">DOCUMENTOS NORMATIVOS</div>
            </div>

            <div class="card-info">
                <img src="{{ asset('panel-autoridad.jpg') }}" alt="Autoridad y personal administrativo">
                <div class="overlay">AUTORIDAD Y PERSONAL ADMINISTRATIVO</div>
            </div>
        </div>
    </div>

    <div class="section-title">Diplomado</div>

    <div class="panel">
        <div class="diplomado-box">
            <div class="flyer-box">
                <img src="{{ asset('flyer-diplomado.jpg') }}" alt="Flyer del diplomado">
            </div>

            <div class="diplomado-content">
                <h2>Diplomado en Métodos Cualitativos de Investigación e Inteligencia Artificial</h2>

                <p>
                    Programa académico orientado al fortalecimiento de capacidades en investigación
                    cualitativa y uso estratégico de herramientas de inteligencia artificial aplicadas
                    al análisis, organización y producción académica.
                </p>

                <div class="meta">
                    <div class="meta-item">
                        <span>Modalidad</span>
                        <strong>Virtual</strong>
                    </div>
                    <div class="meta-item">
                        <span>Inicio</span>
                        <strong>04 de mayo</strong>
                    </div>
                    <div class="meta-item">
                        <span>Unidad responsable</span>
                        <strong>Unidad de Educación a Distancia</strong>
                    </div>
                    <div class="meta-item">
                        <span>Proceso</span>
                        <strong>Inscripción con validación de pago</strong>
                    </div>
                </div>

                <a href="{{ route('inscripciones.create') }}" class="btn-primary">Inscribirse</a>

                <div class="footer-note">
                    Para participar, complete correctamente la ficha de inscripción y adjunte el voucher correspondiente.
                </div>
            </div>
        </div>
    </div>
@endsection