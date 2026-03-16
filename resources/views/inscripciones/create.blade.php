<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción al Diplomado</title>
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

        .intro-grid{
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
            display:block;
        }

        .intro-content h2{
            margin:0 0 12px;
            color:var(--azul-oscuro);
            font-size:28px;
        }

        .intro-content p{
            margin:0 0 12px;
            line-height:1.7;
            color:#374151;
            font-size:15px;
        }

        .meta{
            display:grid;
            grid-template-columns:repeat(2, 1fr);
            gap:14px;
            margin-top:18px;
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

        .subsection-title{
            background:var(--azul);
            color:#fff;
            font-size:20px;
            font-weight:700;
            padding:14px 16px;
            border-radius:4px;
            margin-bottom:18px;
            box-shadow:var(--shadow);
        }

        .form-panel{
            background:#fff;
            border:1px solid var(--linea);
            border-radius:8px;
            box-shadow:var(--shadow);
            padding:24px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:repeat(2, 1fr);
            gap:18px 22px;
        }

        .field{
            display:flex;
            flex-direction:column;
        }

        .field.full{
            grid-column:1 / -1;
        }

        label{
            font-size:14px;
            font-weight:700;
            margin-bottom:8px;
            color:#243447;
        }

        .required{
            color:#b91c1c;
            margin-left:4px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"],
        select{
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

        input:focus,
        select:focus{
            border-color:var(--azul);
            box-shadow:0 0 0 3px rgba(31,111,184,.10);
        }

        .hint{
            margin-top:6px;
            font-size:12px;
            color:var(--gris);
            line-height:1.5;
        }

        .declaration{
            margin-top:20px;
            border:1px solid var(--linea);
            border-radius:8px;
            background:#f8fafc;
            padding:16px;
        }

        .declaration label{
            display:flex;
            align-items:flex-start;
            gap:10px;
            margin:0;
            font-weight:500;
            line-height:1.7;
        }

        .actions{
            margin-top:22px;
            display:flex;
            align-items:center;
            gap:14px;
            flex-wrap:wrap;
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

        .form-note{
            font-size:12px;
            color:var(--gris);
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

        @media (max-width: 900px){
            .intro-grid{
                grid-template-columns:1fr;
            }

            .form-grid{
                grid-template-columns:1fr;
            }

            .meta{
                grid-template-columns:1fr;
            }

            .topbar-inner{
                flex-direction:column;
                align-items:flex-start;
            }
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

.admin-link{
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

.admin-link:hover{
    background:var(--azul);
    color:#fff;
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

        <a href="{{ url('/login') }}" class="admin-link">Acceso administrativo</a>
    </div>
</header>

    <main class="container">
        <div class="section-title">Diplomado</div>

        <section class="panel">
            <div class="intro-grid">
                <div class="flyer-box">
                    <img src="{{ asset('flyer.jpg') }}" alt="Flyer del diplomado">
                </div>

                <div class="intro-content">
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
                </div>
            </div>
        </section>

        <div class="subsection-title">Ficha de inscripción</div>

        <section class="form-panel">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('inscripciones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="field">
                        <label for="nombres">Nombres<span class="required">*</span></label>
                        <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
                    </div>

                    <div class="field">
                        <label for="apellidos">Apellidos<span class="required">*</span></label>
                        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                    </div>

                    <div class="field">
                        <label for="celular">Número de celular<span class="required">*</span></label>
                        <input type="text" id="celular" name="celular" value="{{ old('celular') }}" required>
                    </div>

                    <div class="field">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="field">
                        <label for="dni">DNI<span class="required">*</span></label>
                        <input type="text" id="dni" name="dni" maxlength="8" value="{{ old('dni') }}" required>
                        <div class="hint">Ingrese 8 dígitos.</div>
                    </div>

                    <div class="field">
                        <label for="grado_academico">Grado académico<span class="required">*</span></label>
                        <select id="grado_academico" name="grado_academico" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Bachiller" {{ old('grado_academico') == 'Bachiller' ? 'selected' : '' }}>Bachiller</option>
                            <option value="Titulado" {{ old('grado_academico') == 'Titulado' ? 'selected' : '' }}>Titulado</option>
                        </select>
                    </div>

                    <div class="field full">
                        <label for="voucher">Voucher de pago<span class="required">*</span></label>
                        <input type="file" id="voucher" name="voucher" accept=".jpg,.jpeg,.png,.pdf" required>
                        <div class="hint">Adjunte un archivo legible en formato JPG, JPEG, PNG o PDF. Tamaño máximo permitido: 2 MB.</div>
                    </div>
                </div>

                <div class="declaration">
                    <label>
                        <input type="checkbox" required>
                        <span>
                            Declaro que la información proporcionada es verídica y que el voucher adjuntado corresponde al pago realizado para el proceso de inscripción del diplomado.
                        </span>
                    </label>
                </div>

                <div class="actions">
                    <button type="submit" class="btn-primary">Registrar inscripción</button>
                    <div class="form-note">Los campos marcados con <strong>*</strong> son obligatorios.</div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>