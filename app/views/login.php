<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <a href="/cripto-simulator/Crypto/index">Regresar</a>
    </header>

    <h1>Iniciar Sesión</h1>
    <form method="POST" action="/cripto-simulator/User/iniciar_sesion">
        <div>
            <label for="name">Ingresa tu nombre o correo</label>
            <input type="text" name="name-email">
        </div>
        <div>
            <label for="name">Ingresa tu contraseña</label>
            <input type="password" name="password">
        </div>
        <p>¿Aún no tienes un usuario?, <a href="/cripto-simulator/User/registro">Registrate</a></p>
        <button>Ingresar</button>
    </form>
</body>

</html>