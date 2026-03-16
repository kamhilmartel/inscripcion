<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Administrativo')</title>
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
            --warning-bg:#fff7ed;
            --warning-text:#9a3412;
            --danger-bg:#fef2f2;
            --danger-text:#991b1b;
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
            max-width:1320px;
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
            object-fit:contain;
        }

        .brand-text{
            line-height:1.35;
        }

        .brand-text .uni{
            font-size:15px;
            font-weight:700;
            color:#1f2937;
        }

        .brand-text .unidad{
            font-size:14px;
            color:var(--gris);
        }

        .top-actions{
            display:flex;
            align-items:center;
            gap:10px;
            flex-wrap:wrap;
        }

        .top-link,
        .logout-btn{
            display:inline-block;
            text-decoration:none;
            background:#f8fafc;
            color:var(--azul-oscuro);
            border:1px solid var(--linea);
            padding:10px 14px;
            border-radius:6px;
            font-size:13px;
            font-weight:700;
            transition:.2s ease;
            white-space:nowrap;
        }

        .top-link:hover,
        .logout-btn:hover{
            background:var(--azul);
            color:#fff;
        }

        .logout-btn{
            cursor:pointer;
        }

        .nav{
            background:#fff;
            border-bottom:1px solid var(--linea);
        }

        .nav-inner{
            max-width:1320px;
            margin:0 auto;
            padding:0 20px;
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }

        .nav a{
            text-decoration:none;
            color:#183b63;
            font-size:14px;
            font-weight:700;
            padding:14px 16px;
            display:inline-block;
            border-bottom:3px solid transparent;
        }

        .nav a.active{
            color:var(--azul);
            border-bottom-color:var(--azul);
        }

        .container{
            max-width:1320px;
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

        .panel h3{
            margin:0 0 10px;
            color:var(--azul-oscuro);
            font-size:24px;
        }

        .panel p{
            margin:0;
            line-height:1.7;
            color:#374151;
            font-size:15px;
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
            background:var(--danger-bg);
            color:var(--danger-text);
        }

        .stats{
            display:grid;
            grid-template-columns:repeat(4, 1fr);
            gap:16px;
        }

        .stat-card{
            background:#fff;
            border:1px solid var(--linea);
            border-radius:8px;
            box-shadow:var(--shadow);
            padding:18px;
        }

        .stat-card span{
            display:block;
            font-size:12px;
            color:var(--gris);
            margin-bottom:8px;
        }

        .stat-card strong{
            font-size:34px;
            color:var(--azul-oscuro);
        }

        .quick-grid{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            gap:16px;
        }

        .quick-card{
            border:1px solid var(--linea);
            border-radius:8px;
            padding:18px;
            background:#fff;
        }

        .quick-card h4{
            margin:0 0 8px;
            color:#1f2937;
            font-size:20px;
        }

        .quick-card p{
            margin:0 0 14px;
            font-size:14px;
            color:#4b5563;
        }

        .btn-primary{
            display:inline-block;
            border:none;
            background:var(--azul);
            color:#fff;
            text-decoration:none;
            padding:10px 14px;
            border-radius:6px;
            font-weight:700;
            cursor:pointer;
            font-size:13px;
        }

        .btn-primary:hover{
            background:var(--azul-oscuro);
        }

        .table-wrap{
            overflow:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:#fff;
        }

        th{
            background:#f8fafc;
            color:var(--azul-oscuro);
            text-align:left;
            font-size:13px;
            padding:14px 12px;
            border-bottom:1px solid var(--linea);
        }

        td{
            padding:14px 12px;
            border-bottom:1px solid #edf2f7;
            font-size:14px;
            vertical-align:top;
        }

        .status{
            display:inline-block;
            padding:6px 10px;
            border-radius:999px;
            font-size:12px;
            font-weight:700;
        }

        .status-pendiente{ background:var(--warning-bg); color:var(--warning-text); }
        .status-validada, .status-pagado{ background:var(--success-bg); color:var(--success-text); }
        .status-observada, .status-vencido{ background:var(--danger-bg); color:var(--danger-text); }

        .inline-form{
            display:flex;
            gap:8px;
            align-items:center;
            flex-wrap:wrap;
        }

        select{
            border:1px solid #cfd8e3;
            border-radius:6px;
            padding:9px 10px;
            font-size:13px;
            background:#fff;
        }

        .empty{
            color:var(--gris);
            text-align:center;
            padding:20px 0;
        }

        @media (max-width: 900px){
            .topbar-inner{
                flex-direction:column;
                align-items:flex-start;
            }

            .stats{
                grid-template-columns:1fr 1fr;
            }

            .quick-grid{
                grid-template-columns:1fr;
            }
        }

        @media (max-width: 640px){
            .stats{
                grid-template-columns:1fr;
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

            <div class="top-actions">
                <a href="{{ url('/') }}" class="top-link">Ir a inscripción</a>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="logout-btn">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </header>

    <nav class="nav">
        <div class="nav-inner">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">INICIO</a>
            <a href="{{ route('admin.inscripciones.index') }}" class="{{ request()->routeIs('admin.inscripciones.*') ? 'active' : '' }}">INSCRIPCIONES</a>
            <a href="{{ route('admin.alumnos.index') }}" class="{{ request()->routeIs('admin.alumnos.*') ? 'active' : '' }}">ALUMNOS</a>
            <a href="{{ route('admin.pagos.index') }}" class="{{ request()->routeIs('admin.pagos.*') ? 'active' : '' }}">PAGOS</a>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>