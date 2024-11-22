<!doctype html>
<html lang="en">
    <head>
        <title>TECOPOOL - Iniciar Sesion</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="icon" href="{{ asset('assets/tecopoolicon.png') }}" />
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}" />
        <style>
        /* Fondo con animación de olas */
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #87CEEB;
            overflow: hidden;
            position: relative;
        }
        .wave {
            position: absolute;
            width: 200%;
            height: 20%;
            bottom: 0;
            left: 0;
            background: rgba(30, 144, 255, 0.6);
            border-radius: 100% 100% 0 0;
            animation: wave-sine 4s infinite ease-in-out;
            transform-origin: bottom;
        }
        .wave:nth-child(2) {
            background: rgba(0, 191, 255, 0.5);
            height: 22%;
            animation: wave-sine 6s infinite ease-in-out;
            animation-delay: -1s;
        }
        .wave:nth-child(3) {
            background: rgba(70, 130, 180, 0.4);
            height: 24%;
            animation: wave-sine 8s infinite ease-in-out;
            animation-delay: -2s;
        }
        @keyframes wave-sine {
            0%, 100% {
                transform: scaleY(1);
            }
            50% {
                transform: scaleY(1.2);
            }
        }
        </style>
    </head>
    <body>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="card shadow-lg" style="max-width: 400px; width: 100%;">
        <div class="card-body p-4">
            <strong><h2 class="text-center mb-4">Iniciar Sesión</h2></strong>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">Recuérdame</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">¿Olvidaste tu contraseña?</a>
            </div>
            <!-- Social Login -->
            <div class="text-center mt-4">
                <p class="mb-2">Iniciar sesión con</p>
                <a href="/google-auth/redirect" class="btn btn-outline-danger btn-sm me-2">
                    <i class="bi bi-google"></i> Google
                </a>
                <a href="/facebook-auth/redirect" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-facebook"></i> Facebook
                </a>
            </div>
        </div>
    </div>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>