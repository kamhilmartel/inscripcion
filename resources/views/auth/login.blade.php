<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso administrativo</title>
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
            --error-bg:#fef2f2;
            --error-text:#991b1b;
            --success-bg:#ecfdf3;
            --success-text:#166534;
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

        .back-link{
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

        .back-link:hover{
            background:var(--azul);
            color:#fff;
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
            padding:28px;
        }

        .login-wrap{
            max-width:520px;
            margin:0 auto;
        }

        .login-head{
            margin-bottom:20px;
        }

        .login-head h2{
            margin:0 0 10px;
            color:var(--azul-oscuro);
            font-size:30px;
        }

        .login-head p{
            margin:0;
            color:#374151;
            line-height:1.7;
            font-size:15px;
        }

        .field{
            margin-bottom:18px;
        }

        label{
            display:block;
            font-size:14px;
            font-weight:700;
            margin-bottom:8px;
            color:#243447;
        }

        input[type="email"],
        input[type="password"]{
            width:100%;
            border:1px solid #cfd8e3;
            border-radius:6px;
            padding:12px 13px;
            font-size:14px;
            background:#fff;
            color:#111827;
            outline:none;
            transition:border-color .2s ease, box-shadow .2s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus{
            border-color:var(--azul);
            box-shadow:0 0 0 3px rgba(31,111,184,.10);
        }

        .row{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:16px;
            margin-bottom:20px;
            flex-wrap:wrap;
        }

        .remember{
            display:flex;
            align-items:center;
            gap:8px;
            font-size:13px;
            color:var(--gris);
        }

        .forgot{
            font-size:13px;
            color:var(--azul-oscuro);
            text-decoration:none;
            font-weight:700;
        }

        .forgot:hover{
            text-decoration:underline;
        }

        .btn-primary{
            display:inline-block;
            width:100%;
            border:none;
            background:var(--azul);
            color:#fff;
            text-decoration:none;
            padding:13px 18px;
            border-radius:6px;
            font-weight:700;
            cursor:pointer;
            font-size:14px;
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

        .alert-error ul{
            margin:0;
            padding-left:18px;
        }

        .footer-note{
            margin-top:18px;
            font-size:12px;
            color:var(--gris);
            text-align:center;
        }

        @media (max-width: 900px){
            .topbar-inner{
                flex-direction:column;
                align-items:flex-start;
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

            <a href="{{ url('/') }}" class="back-link">Volver a inscripción</a>
        </div>
    </header>

    <main class="container">
        <div class="section-title">Acceso administrativo</div>

        <section class="panel">
            <div class="login-wrap">
                <div class="login-head">
                    <h2>Iniciar sesión</h2>
                    <p>
                        Ingrese con sus credenciales para acceder al panel administrativo
                        del diplomado.
                    </p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="field">
                        <label for="email">Correo electrónico</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    </div>

                    <div class="field">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password">
                    </div>

                    <div class="row">
                        <label class="remember">
                            <input type="checkbox" name="remember">
                            <span>Recordarme</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot" href="{{ route('password.request') }}">
                                ¿Olvidó su contraseña?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn-primary">Ingresar al sistema</button>
                </form>

                <div class="footer-note">
                    Acceso restringido para personal autorizado.
                </div>
            </div>
        </section>
    </main>
</body>
</html>