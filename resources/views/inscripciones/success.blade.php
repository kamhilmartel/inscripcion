<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción registrada</title>
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
            max-width:1100px;
            margin:0 auto;
            padding:14px 20px;
            display:flex;
            align-items:center;
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

        .wrapper{
            max-width:900px;
            margin:50px auto;
            padding:0 20px;
        }

        .card{
            background:#fff;
            border:1px solid var(--linea);
            border-radius:12px;
            box-shadow:var(--shadow);
            padding:40px 30px;
            text-align:center;
        }

        .check{
            width:110px;
            height:110px;
            border-radius:50%;
            background:#e8f7ed;
            color:#16a34a;
            margin:0 auto 24px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:56px;
            font-weight:700;
        }

        h1{
            margin:0 0 14px;
            color:var(--azul-oscuro);
            font-size:34px;
        }

        p{
            margin:0 auto 12px;
            max-width:680px;
            line-height:1.8;
            font-size:17px;
            color:#374151;
        }

        .btn{
            margin-top:26px;
            display:inline-block;
            text-decoration:none;
            background:var(--azul);
            color:#fff;
            padding:13px 22px;
            border-radius:8px;
            font-weight:700;
        }

        .btn:hover{
            background:var(--azul-oscuro);
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
        </div>
    </header>

    <div class="wrapper">
        <div class="card">
            <div class="check">✓</div>
            <h1>¡Ya te registraste correctamente!</h1>
            <p>
                Tu inscripción fue enviada con éxito.
            </p>
            <p>
                Ahora debes esperar a que se valide la autenticidad del voucher y la información registrada.
            </p>
            <a href="{{ route('inscripciones.create') }}" class="btn">Volver al formulario</a>
        </div>
    </div>
</body>
</html>