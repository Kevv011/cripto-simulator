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

    <h2>Tu Billetera</h2>
    <p>Saldo: $<?= number_format($_SESSION['saldo'], 2) ?></p>
    <h3>Tus Criptomonedas</h3>
    <ul>
        <?php foreach ($_SESSION['criptos'] as $cripto => $cantidad): ?>
            <li><?= $cripto ?>: <?= $cantidad ?> unidades</li>
        <?php endforeach; ?>
    </ul>

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

</body>

</html>