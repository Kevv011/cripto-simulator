<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Boton para regresar a pantalla principal-->
    <header>
        <a href="/cripto-simulator/Crypto/index">Regresar</a>
    </header>

    <!--Impresion del saldo actual definido en config > sessionManager.php-->
    <h2>Tu Billetera</h2>
    <p>Saldo: $<?= number_format($_SESSION['saldo'], 2) ?></p>
    <h3>Tus Criptomonedas</h3>
    <ul>
        <!--Se imprimen la cantidad de criptomonedas que tiene el cliente en caso de haber comprado-->
        <?php foreach ($_SESSION['criptos'] as $cripto => $cantidad): ?>
            <li><?= $cripto ?>: <?= $cantidad ?> unidades</li>
        <?php endforeach; ?>
    </ul>

    <!--Aqui se crea la funcionalidad de comprar criptomonedas, validando funcionamiento desde su modelo y controlador-->
    <h3>Comprar Criptomonedas</h3>
    <form method="post" action="/cripto-simulator/Crypto/comprar">
        <select name="cripto">
            <?php foreach ($_SESSION['precios'] as $cripto => $precio): ?>
                <option value="<?= $cripto ?>"><?= $cripto ?> ($<?= number_format($precio, 2) ?>)</option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="cantidad" step="0.01" required>
        <button type="submit">Comprar</button>
    </form>

    <!--Aqui se crea la funcionalidad de vender criptomonedas, validando funcionamiento desde su modelo y controlador-->
    <h3>Vender Criptomonedas</h3>
    <form method="post" action="/cripto-simulator/Crypto/vender">
        <select name="cripto">
            <?php foreach ($_SESSION['criptos'] as $cripto => $cantidad): ?>
                <option value="<?= $cripto ?>"><?= $cripto ?> (<?= $cantidad ?>)</option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="cantidad" step="0.01" required>
        <button type="submit">Vender</button>
    </form>

    <br>
    <hr>

</body>

</html>