<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Diplomado')</title>
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
        }

        *{
            box-sizing:border-box;
        }

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
            padding:10px 20px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:20px;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:14px;
        }

        .brand img{
            height:52px;
            width:auto;
            object-fit:contain;
        }

        .brand-text{
            font-size:13px;
            color:var(--gris);
            line-height:1.4;
        }

        .menu{
            display:flex;
            gap:24px;
            flex-wrap:wrap;
        }

        .menu a{
            text-decoration:none;
            color:#183b63;
            font-size:14px;
            font-weight:700;
        }

        .banner{
            width:100%;
            background:#ddd;
        }

        .banner img{
            width:100%;
            height:180px;
            object-fit:cover;
            display:block;
        }

        .container{
            max-width:1320px;
            margin:28px auto;
            padding:0 20px 40px;
        }

        .section-title{
            background:var(--azul);
            color:#fff;
            font-size:20px;
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

        .cards-3{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            gap:16px;
        }

        .card-info{
            position:relative;
            border-radius:10px;
            overflow:hidden;
            min-height:150px;
            box-shadow:var(--shadow);
        }

        .card-info img{
            width:100%;
            height:150px;
            object-fit:cover;
            display:block;
        }

        .card-info .overlay{
            position:absolute;
            inset:0;
            background:rgba(31,111,184,.65);
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
            color:#fff;
            font-size:18px;
            font-weight:700;
            padding:12px;
        }

        .diplomado-box{
            display:grid;
            grid-template-columns:280px 1fr;
            gap:26px;
            align-items:start;
        }

        .flyer-box img{
            width:100%;
            max-width:260px;
            border:1px solid var(--linea);
            box-shadow:var(--shadow);
        }

        .diplomado-content h2{
            margin:0 0 12px;
            color:var(--azul-oscuro);
            font-size:28px;
        }

        .diplomado-content p{
            margin:0 0 12px;
            line-height:1.7;
            color:#374151;
            font-size:15px;
        }

        .meta{
            display:grid;
            grid-template-columns:repeat(2, 1fr);
            gap:14px;
            margin:18px 0;
        }

        .meta-item{
            background:#f8fafc;
            border:1px solid var(--linea);
            padding:14px;
            border-radius:8px;
        }

        .meta-item span{
            display:block;
            font-size:12px;
            color:var(--gris);
            margin-bottom:6px;
        }

        .meta-item strong{
            font-size:15px;
            color:#111827;
        }

        .btn-primary{
            display:inline-block;
            background:var(--azul);
            color:#fff;
            text-decoration:none;
            padding:12px 18px;
            border-radius:6px;
            font-weight:700;
        }

        .btn-primary:hover{
            background:var(--azul-oscuro);
        }

        .footer-note{
            margin-top:24px;
            color:var(--gris);
            font-size:13px;
        }

        @media (max-width: 900px){
            .cards-3{
                grid-template-columns:1fr;
            }

            .diplomado-box{
                grid-template-columns:1fr;
            }

            .meta{
                grid-template-columns:1fr;
            }

            .banner img{
                height:120px;
            }

            .menu{
                gap:14px;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <div class="brand">
                <img src="{{ asset('logo-unidad.png') }}" alt="Logo">
                <div class="brand-text">
                    Universidad Nacional Hermilio Valdizán<br>
                    Unidad de Educación a Distancia
                </div>
            </div>

            <nav class="menu">
                <a href="/">INICIO</a>
                <a href="#">NOSOTROS</a>
                <a href="#">DOCUMENTOS NORMATIVOS</a>
                <a href="#">DIRECCIÓN DE ASUNTOS Y SERVICIOS ACADÉMICOS</a>
            </nav>
        </div>
    </header>

    <div class="banner">
        <img src="{{ asset('banner-unidad.jpg') }}" alt="Banner institucional">
    </div>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>