<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--Opcion para regresar a la billetera-->
    <header>
        <a href="/cripto-simulator/Crypto/compraVenta">Regresar a la billetera</a>
    </header>

    <!--A partir de la logica del modelo y el manejo en el controlador, se imprime el mensaje si fue exitosa o no la venta de criptomonedas-->
    <?php if (isset($_SESSION['mensaje'])) { ?>
        <div>
            <?= $_SESSION['mensaje']; ?>
        </div>
        <?php unset($_SESSION['mensaje']); ?>
    <?php } else { ?>

        <div>
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php } ?>

</body>

</html>