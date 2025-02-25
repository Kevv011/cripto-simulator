<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <a href="/cripto-simulator/Crypto/compraVenta">Regresar a la billetera</a>
    </header>

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