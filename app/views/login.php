<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color:rgb(245, 252, 244);
            font-family: 'Poppins', sans-serif;  
        }

        .login-container {
            max-width: 450px;
            margin: 100px auto;  
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color:rgb(103, 151, 91);
            font-weight: 600;
        }

        .login-container p {
            text-align: center;
            font-size: 0.9rem;
            color:rgb(105, 151, 91);
        }

        .form-label {
            font-weight: 500;
        }

        .login-container input {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 12px;
            margin-bottom: 20px;
            width: 99%;
            font-size: 1rem;
        }

        .btn-login {
            background-color:rgb(118, 151, 91);
            color: white;
            width: 105%;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 5px;
            border: none;
        }

        .btn-login:hover {
            background-color:rgb(96, 128, 74);
            transition: background-color 0.3s ease;
        }

        .footer-text a {
            text-decoration: none;
            font-weight: 500;
            color:rgb(87, 134, 81);
        }

    </style>
</head>

<body>

    <div class="login-container">
        <h1>Iniciar Sesión</h1>

        <!-- Formulario de inicio de sesión -->
        <form method="POST" action="/cripto-simulator/User/iniciar_sesion">
            <div class="mb-3">
                <label for="name-email" class="form-label">Ingresa tu nombre o correo: </label>
                <input type="text" name="name-email" class="form-control" id="name-email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Ingresa tu contraseña: </label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-login">Ingresar</button>
            </div>
        </form>

        <p class="footer-text">¿Aún no tienes un usuario? <a href="/cripto-simulator/User/registro">Regístrate</a></p>
    </div>

    <!-- Enlace a los scripts de Bootstrap -->
</body>

</html>

