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

    <!--Formulario de registro de usuario con 3 campos-->
    <h1>Registro</h1>
    <form method="POST" action="/cripto-simulator/User/registro">
        <div>
            <label for="name">Ingresa tu nombre de usuario</label>
            <input type="text" name="userName">
        </div>
        <div>
            <label for="name">Ingresa tu correo</label>
            <input type="email" name="userEmail">
        </div>
        <div>
            <label for="name">Ingresa tu contraseña</label>
            <input type="password" name="UserPass">
        </div>
        <p>¿Ya tienes un usuario?, <a href="/cripto-simulator/User/iniciar_sesion">Iniciar Sesión</a></p>
        <button>Registrarse</button>
    </form>
</body>

</html>