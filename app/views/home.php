<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cripto Simulator</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: rgb(245, 252, 244);
            
            font-family: 'Poppins', sans-serif;
        }

        header {
            background-color:rgb(255, 255, 255);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        header a {
            color: rgb(118, 151, 91);
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        header a:hover {
            text-decoration: underline;
        }

        h2 {
            text-align: center;
            margin-top: 40px;
            color:rgb(0, 0, 0);
            font-size: 2rem;
            font-weight: bold;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 600px;
        }

        ul li {
            background-color: #ffffff;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            color: #333;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        ul li:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        ul li span {
            font-weight: bold;
        }

        button {
            background-color:rgb(118, 151, 91);  
            color: white;  
            width: 50%;  
            padding: 15px;  
            border: none;  
            border-radius: 8px;  
            font-size: 16px;  
            margin: 30px auto 0;  
            display: block;  
            transition: background-color 0.3s ease;  
            font-weight: bold;
        }


        button:hover {
            background-color:rgb(114, 163, 99);
        }


    </style>
</head>

<body>

    <header>
        <!-- Verifica si el usuario esta en la billetera para que no aparezcan estas opciones -->
        <?php $url_vista = $_SERVER['REQUEST_URI'];
        if ($url_vista !== "/cripto-simulator/Crypto/billetera") { ?>

            <!-- Si hay un usuario logueado, redirige a la billetera para hacer compras y ventas -->
            <?php if ($_SESSION['autenticado'] == true) { ?>
                <a href="/cripto-simulator/Crypto/billetera">Ir a la billetera</a>
                <a href="/cripto-simulator/User/cerrar_sesion">Cerrar Sesión</a>
                <p>Bienvenido, <?= $_SESSION['usuario']  ?></p>

                <!-- Si No hay un usuario logueado, redirige al login y da acceso al registro y el login directamente -->
            <?php } else { ?>
                <a href="/cripto-simulator/User/iniciar_sesion">Ir a la billetera</a>
                <a href="/cripto-simulator/User/iniciar_sesion">Iniciar Sesión</a>
                <a href="/cripto-simulator/User/registro">Registrarse</a>
            <?php } ?>
        <?php } ?>
    </header>

    <!-- Impresion de las criptomonedas y sus precios segun las actualizaciones realizadas -->
    <h2>Precios Actuales</h2>
    <ul>
        <?php foreach ($_SESSION['precios'] as $cripto => $precio): ?>
            <li>
                <span><?= $cripto ?>:</span>
                $<?= number_format($precio, 2) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <form method="post" action="/cripto-simulator/Crypto/actualizarPrecios" class="mb-4">
        <button type="submit">Actualizar Precios</button>
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
