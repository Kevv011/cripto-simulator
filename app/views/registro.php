<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuaio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/cripto-simulator/app/styles/registro.css">
</head>

<body>
    <div class="registro-container container">
        <header>
            <a href="/cripto-simulator/Crypto/index">Regresar</a>
        </header>

        <!--Formulario de registro de usuario con 3 campos-->
        <h1 class="h1">Registro</h1>
        <form method="POST" action="/cripto-simulator/User/registro">
            <div class="mb-3">
                <label class="form-label" for="name">Ingresa tu nombre de usuario:</label>
                <input class="form-control" type="text" name="userName" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Ingresa tu correo:</label>
                <input class="form-control" type="email" name="userEmail" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Ingresa tu contraseña:</label>
                <input class="form-control" type="password" name="UserPass" required>
            </div>
            <p>¿Ya tienes un usuario? <a href="/cripto-simulator/User/iniciar_sesion">Iniciar Sesión</a></p>
            <button class="btn btn-primary btn-registro">Registrarse</button>
        </form>
    </div>

</body>

</html>