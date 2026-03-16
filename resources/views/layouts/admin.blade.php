<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel administrativo')</title>
    <style>
        :root{
            --primary:#0f2f57;
            --primary-dark:#0a2340;
            --accent:#c5a24a;
            --bg:#eef3f8;
            --card:#ffffff;
            --text:#1f2937;
            --muted:#6b7280;
            --line:#d9e2ec;
            --success-bg:#ecfdf3;
            --success-text:#166534;
            --warning-bg:#fff7ed;
            --warning-text:#9a3412;
            --danger-bg:#fef2f2;
            --danger-text:#991b1b;
            --shadow:0 10px 25px rgba(15,47,87,.08);
            --radius:16px;
        }

        *{ box-sizing:border-box; }

        body{
            margin:0;
            font-family:"Segoe UI", Tahoma, Arial, sans-serif;
            background:linear-gradient(180deg, #f8fafc 0%, var(--bg) 100%);
            color:var(--text);
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:280px;
            background:linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color:#fff;
            padding:28px 22px;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .brand small{
            display:block;
            color:#d6dfeb;
            font-size:12px;
            letter-spacing:.08em;
            text-transform:uppercase;
            margin-bottom:10px;
        }

        .brand h1{
            margin:0;
            font-size:24px;
            font-weight:800;
        }

        .brand p{
            margin:10px 0 0;
            color:#d6dfeb;
            font-size:13px;
            line-height:1.6;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:10px;
            margin-top:28px;
        }

        .menu a{
            display:block;
            padding:13px 14px;
            border-radius:12px;
            color:#fff;
            text-decoration:none;
            font-weight:600;
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.08);
        }

        .menu a.active,
        .menu a:hover{
            background:rgba(255,255,255,.16);
        }

        .logout-form button{
            width:100%;
            border:none;
            padding:13px 14px;
            border-radius:12px;
            background:#8b1e1e;
            color:#fff;
            font-weight:700;
            cursor:pointer;
        }

        .main{
            flex:1;
            padding:34px;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:16px;
            margin-bottom:24px;
        }

        .topbar h2{
            margin:0;
            font-size:32px;
            color:var(--primary);
        }

        .topbar p{
            margin:10px 0 0;
            color:var(--muted);
            font-size:14px;
            line-height:1.7;
            max-width:760px;
        }

        .badge{
            padding:10px 14px;
            border-radius:999px;
            background:#fff;
            border:1px solid var(--line);
            color:var(--primary);
            font-weight:700;
            font-size:13px;
            box-shadow:var(--shadow);
            white-space:nowrap;
        }

        .panel{
            background:#fff;
            border:1px solid var(--line);
            border-radius:var(--radius);
            box-shadow:var(--shadow);
            overflow:hidden;
            margin-bottom:22px;
        }

        .panel-head{
            padding:22px 24px;
            border-bottom:1px solid var(--line);
        }

        .panel-head h3{
            margin:0;
            color:var(--primary);
            font-size:20px;
        }

        .panel-head p{
            margin:6px 0 0;
            color:var(--muted);
            font-size:13px;
        }

        .panel-body{
            padding:20px 24px 24px;
        }

        .alert{
            margin:20px 24px 0;
            padding:14px 16px;
            border-radius:12px;
            font-size:14px;
        }

        .alert-success{
            background:var(--success-bg);
            color:var(--success-text);
        }

        .table-wrap{
            padding:20px 24px 24px;
            overflow:auto;
        }

        table{
            width:100%;
            border-collapse:separate;
            border-spacing:0;
            min-width:980px;
        }

        th{
            background:#f8fafc;
            color:var(--primary);
            font-size:13px;
            text-align:left;
            padding:14px;
            border-bottom:1px solid var(--line);
        }

        td{
            padding:14px;
            border-bottom:1px solid #edf2f7;
            vertical-align:top;
            font-size:14px;
        }

        tr:hover td{
            background:#fcfdff;
        }

        .name strong{
            display:block;
            color:#111827;
            margin-bottom:4px;
        }

        .name span{
            color:var(--muted);
            font-size:12px;
        }

        .status{
            display:inline-flex;
            align-items:center;
            padding:7px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:700;
        }

        .status-pendiente{ background:var(--warning-bg); color:var(--warning-text); }
        .status-validada, .status-pagado, .status-activo, .status-al-dia{ background:var(--success-bg); color:var(--success-text); }
        .status-observada, .status-vencido, .status-con-deuda{ background:var(--danger-bg); color:var(--danger-text); }

        .btn-link{
            display:inline-block;
            padding:9px 12px;
            border-radius:10px;
            background:var(--primary);
            color:#fff;
            text-decoration:none;
            font-size:13px;
            font-weight:700;
        }

        .inline-form{
            display:flex;
            gap:8px;
            align-items:center;
            flex-wrap:wrap;
        }

        select, input[type="text"], input[type="date"], input[type="number"], textarea{
            border:1px solid #cfd8e3;
            border-radius:10px;
            padding:9px 10px;
            font-size:13px;
            background:#fff;
            width:100%;
        }

        button.save-btn{
            border:none;
            background:#0f2f57;
            color:#fff;
            padding:9px 12px;
            border-radius:10px;
            font-weight:700;
            cursor:pointer;
            font-size:13px;
        }

        .empty{
            padding:30px 24px;
            color:var(--muted);
            text-align:center;
        }

        .grid-3{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            gap:16px;
        }

        .card-lite{
            border:1px solid var(--line);
            border-radius:14px;
            padding:18px;
            background:linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
        }

        .card-lite h4{
            margin:0 0 8px;
            color:#111827;
        }

        .card-lite p{
            margin:0 0 14px;
            color:var(--muted);
            font-size:13px;
            line-height:1.6;
        }

        @media (max-width: 1100px){
            .grid-3{ grid-template-columns:1fr; }
        }

        @media (max-width: 900px){
            .layout{ flex-direction:column; }
            .sidebar{ width:100%; }
            .main{ padding:20px; }
            .topbar{ flex-direction:column; }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div>
                <div class="brand">
                    <small>Panel de gestión</small>
                    <h1>Diplomado</h1>
                    <p>Sistema de control administrativo para inscripciones, alumnos y pagos.</p>
                </div>

                <nav class="menu">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Inicio</a>
                    <a href="{{ route('admin.inscripciones.index') }}" class="{{ request()->routeIs('admin.inscripciones.*') ? 'active' : '' }}">Inscripciones</a>
                    <a href="{{ route('admin.alumnos.index') }}" class="{{ request()->routeIs('admin.alumnos.*') ? 'active' : '' }}">Alumnos</a>
                    <a href="{{ route('admin.pagos.index') }}" class="{{ request()->routeIs('admin.pagos.*') ? 'active' : '' }}">Pagos</a>
                </nav>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </aside>

        <main class="main">
            <div class="topbar">
                <div>
                    <h2>@yield('page_title')</h2>
                    <p>@yield('page_description')</p>
                </div>
                <div class="badge">@yield('page_badge')</div>
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>