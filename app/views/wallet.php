<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billetera - Cripto Simulador</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgb(118, 151, 91);
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
        }

        header a:hover {
            text-decoration: underline;
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        h2 {
            margin-top: 30px;
            font-size: 2.5rem;
        }

        h3 {
            margin-top: 30px;
            font-size: 1.8rem;
        }

        p {
            text-align: center;
            font-size: 1.2rem;
            color: #333;
        }

        .wallet-info {
            background-color: white;
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .wallet-info ul {
            list-style-type: none;
            padding-left: 0;
        }

        .wallet-info li {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .form-container {
            background-color: white;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container select, .form-container input, .form-container button {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .form-container select {
            background-color: #f9f9f9;
        }

        .form-container input {
            background-color: #f9f9f9;
        }

        .form-container button {
            background-color: rgb(118, 151, 91);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: rgb(118, 151, 91);
        }

        hr {
            border: 0;
            border-top: 2px solid #ddd;
            margin: 40px 0;
        }
    </style>
</head>

<body>
    <!-- Botón para regresar a la pantalla principal -->
    <header>
        <a href="/cripto-simulator/Crypto/index">Regresar</a>
    </header>

    <!-- Impresión del saldo actual -->
    <div class="wallet-info">
        <h2>Tu Billetera</h2>
        <p>Saldo: $<?= number_format($_SESSION['saldo'], 2) ?></p>
        <h3>Tus Criptomonedas</h3>
        <ul>
            <!-- Se imprimen la cantidad de criptomonedas que tiene el cliente -->
            <?php foreach ($_SESSION['criptos'] as $cripto => $cantidad): ?>
                <li><?= $cripto ?>: <?= $cantidad ?> unidades</li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Formulario de compra de criptomonedas -->
    <div class="form-container">
        <h3>Comprar Criptomonedas</h3>
        <form method="post" action="/cripto-simulator/Crypto/comprar">
            <select name="cripto">
                <?php foreach ($_SESSION['precios'] as $cripto => $precio): ?>
                    <option value="<?= $cripto ?>"><?= $cripto ?> ($<?= number_format($precio, 2) ?>)</option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="cantidad" step="0.01" required placeholder="Cantidad">
            <button type="submit">Comprar</button>
        </form>
    </div>

    <!-- Formulario de venta de criptomonedas -->
    <div class="form-container">
        <h3>Vender Criptomonedas</h3>
        <form method="post" action="/cripto-simulator/Crypto/vender">
            <select name="cripto">
                <?php foreach ($_SESSION['criptos'] as $cripto => $cantidad): ?>
                    <option value="<?= $cripto ?>"><?= $cripto ?> (<?= $cantidad ?>)</option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="cantidad" step="0.01" required placeholder="Cantidad a vender">
            <button type="submit">Vender</button>
        </form>
    </div>

    <hr>

</body>

</html>