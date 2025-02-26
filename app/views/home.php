<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>

        <!--Si hay un usuario logueado, redirige a la billetera para hacer compras y ventas-->
        <?php if ($_SESSION['autenticado'] == true) { ?>
            <a href="/cripto-simulator/Crypto/compraVenta">Ir a la billetera</a>
            <a href="/cripto-simulator/User/cerrar_sesion">Cerrar Sesión</a>
            <p>Bienvenido, <?= $_SESSION['usuario']  ?></p>

        <!--Si No hay un usuario logueado, redirige al login y da acceso al registro y el login directamente-->
        <?php } else { ?>
            <a href="/cripto-simulator/User/iniciar_sesion">Ir a la billetera</a>
            <a href="/cripto-simulator/User/iniciar_sesion">Iniciar Sesión</a>
            <a href="/cripto-simulator/User/registro">Registrarse</a>
        <?php } ?>

    </header>

    <h2>Precios Actuales</h2>
    <ul>
        <?php foreach ($_SESSION['precios'] as $cripto => $precio): ?>
            <li><?= $cripto ?>: $<?= number_format($precio, 2) ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post" action="/cripto-simulator/Crypto/actualizarPrecios">
        <button type="submit">Actualizar Precios</button>
    </form>

</body>

</html>