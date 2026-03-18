<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de pagos</title>
    <style>
        :root{
            --azul:#1f6fb8;
            --azul-oscuro:#154d80;
            --fondo:#f3f5f7;
            --blanco:#ffffff;
            --texto:#233142;
            --gris:#6b7280;
            --linea:#d9e2ec;
            --shadow:0 4px 14px rgba(0,0,0,.08);
            --radius:8px;
            --success-bg:#ecfdf3;
            --success-text:#166534;
            --error-bg:#fef2f2;
            --error-text:#991b1b;
        }

        *{ box-sizing:border-box; }

        body{
            margin:0;
            font-family:Arial, Helvetica, sans-serif;
            background:var(--fondo);
            color:var(--texto);
        }

        .topbar{
            background:#fff;
            border-bottom:1px solid var(--linea);
        }

        .topbar-inner{
            max-width:1200px;
            margin:0 auto;
            padding:14px 20px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:14px;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:14px;
        }

        .brand img{
            height:58px;
            width:auto;
        }

        .brand-text .uni{
            font-size:15px;
            font-weight:700;
        }

        .brand-text .unidad{
            font-size:14px;
            color:var(--gris);
        }

        .container{
            max-width:1200px;
            margin:28px auto;
            padding:0 20px 40px;
        }

        .section-title{
            background:var(--azul);
            color:#fff;
            font-size:22px;
            font-weight:700;
            padding:14px 16px;
            border-radius:4px;
            margin-bottom:18px;
            box-shadow:var(--shadow);
        }

        .panel{
            background:var(--blanco);
            border:1px solid var(--linea);
            border-radius:var(--radius);
            box-shadow:var(--shadow);
            padding:22px;
            margin-bottom:24px;
        }

        .field{
            display:flex;
            flex-direction:column;
            max-width:350px;
        }

        label{
            font-size:14px;
            font-weight:700;
            margin-bottom:8px;
        }

        input[type="text"],
        input[type="file"]{
            width:100%;
            border:1px solid #cfd8e3;
            border-radius:6px;
            padding:12px 13px;
            font-size:14px;
            background:#fff;
        }

        .btn-primary{
            display:inline-block;
            border:none;
            background:var(--azul);
            color:#fff;
            text-decoration:none;
            padding:12px 18px;
            border-radius:6px;
            font-weight:700;
            cursor:pointer;
        }

        .btn-primary:hover{
            background:var(--azul-oscuro);
        }

        .alert{
            padding:14px 16px;
            border-radius:8px;
            margin-bottom:18px;
            font-size:14px;
        }

        .alert-success{
            background:var(--success-bg);
            color:var(--success-text);
        }

        .alert-error{
            background:var(--error-bg);
            color:var(--error-text);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th, td{
            padding:14px 12px;
            border-bottom:1px solid var(--linea);
            text-align:left;
            vertical-align:top;
        }

        th{
            color:var(--azul-oscuro);
            font-size:14px;
        }

        .status{
            display:inline-block;
            padding:6px 10px;
            border-radius:999px;
            font-size:12px;
            font-weight:700;
        }

        .status-pendiente{ background:#fff7ed; color:#c2410c; }
        .status-pagado{ background:#ecfdf3; color:#166534; }
        .status-vencido{ background:#fef2f2; color:#991b1b; }
        .status-exonerado{ background:#eff6ff; color:#1d4ed8; }

        .mini{
            font-size:12px;
            color:var(--gris);
            margin-top:6px;
        }

        .upload-box{
            min-width:220px;
        }

        .actions-inline{
            display:flex;
            gap:10px;
            align-items:flex-end;
            flex-wrap:wrap;
        }

        @media (max-width: 900px){
            table, thead, tbody, th, td, tr{
                display:block;
            }

            thead{
                display:none;
            }

            tr{
                margin-bottom:18px;
                border:1px solid var(--linea);
                border-radius:8px;
                background:#fff;
                padding:10px;
            }

            td{
                border-bottom:none;
                padding:10px 8px;
            }
        }
    </style>
</head>
<body>
<header class="topbar">
    <div class="topbar-inner">
        <div class="brand">
            <img src="{{ asset('logo.jpg') }}" alt="Logo">
            <div class="brand-text">
                <div class="uni">Universidad Nacional Hermilio Valdizán</div>
                <div class="unidad">Unidad de Educación a Distancia</div>
            </div>
        </div>

        <a href="{{ route('inscripciones.create') }}" class="btn-primary">Ir a inscripción</a>
    </div>
</header>

<main class="container">
    <div class="section-title">Consulta de pagos</div>

    <section class="panel">
        <h3>Buscar por DNI</h3>
        <p>Ingrese su DNI para consultar el estado de sus pensiones, matrícula y diploma.</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pagos.consulta.buscar') }}" method="POST">
            @csrf
            <div class="actions-inline">
                <div class="field">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" id="dni" maxlength="8" value="{{ old('dni', $dniBuscado ?? '') }}" required>
                </div>
                <button type="submit" class="btn-primary">Consultar</button>
            </div>
        </form>
    </section>

    @isset($alumno)
        <section class="panel">
            <h3>Alumno encontrado</h3>
            <p>
                <strong>{{ $inscripcion->nombres }} {{ $inscripcion->apellidos }}</strong><br>
                DNI: {{ $inscripcion->dni }}<br>
                Código: {{ $alumno->codigo }}
            </p>
        </section>

        <section class="panel">
            <h3>Detalle de pagos</h3>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>Estado</th>
                            <th>Fecha pago</th>
                            <th>Voucher actual</th>
                            <th>Subir voucher</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pagosOrdenados = $pagos->sortBy(function ($pago) {
                                $orden = [
                                    'Matrícula' => 1,
                                    'Pensión 1' => 2,
                                    'Pensión 2' => 3,
                                    'Pensión 3' => 4,
                                    'Pensión 4' => 5,
                                    'Diploma'   => 6,
                                ];

                                return $orden[$pago->concepto] ?? 99;
                            });
                        @endphp

                        @foreach($pagosOrdenados as $pago)
                            <tr>
                                <td>{{ $pago->concepto }}</td>
                                <td>S/ {{ number_format($pago->monto, 2) }}</td>
                                <td>
                                    <span class="status status-{{ strtolower($pago->estado) }}">
                                        {{ $pago->estado }}
                                    </span>
                                </td>
                                <td>{{ $pago->fecha_pago ?: 'No registrado' }}</td>
                                <td>
                                    @if($pago->comprobante)
                                        @if($pago->estado === 'Pagado')
                                            Voucher validado
                                            <div class="mini">Pago aprobado administrativamente</div>
                                        @else
                                            Voucher enviado
                                            <div class="mini">Pendiente de revisión administrativa</div>
                                        @endif
                                    @else
                                        Sin voucher
                                    @endif
                                </td>
                                <td>
                                    @if($pago->estado === 'Pagado')
                                        <span class="mini" style="font-size:13px; color:#166534; font-weight:700;">
                                            Pago validado. No requiere nuevo voucher.
                                        </span>
                                    @else
                                        <div class="upload-box">
                                            <form action="{{ route('pagos.consulta.subirVoucher', $pago) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="dni" value="{{ $inscripcion->dni }}">
                                                <input type="file" name="voucher_pago" required>
                                                <div class="mini">JPG, PNG o PDF. Máximo 2 MB.</div>
                                                <button type="submit" class="btn-primary" style="margin-top:10px;">Subir voucher</button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endisset
</main>
</body>
</html>