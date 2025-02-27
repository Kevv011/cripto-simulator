<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Opción para regresar a la billetera -->
    <header class="p-3 text-center">
        <a href="/cripto-simulator/Crypto/billetera" class="btn btn-success">Regresar a la billetera</a>
    </header>

    <!-- Mensajes de éxito o error -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_SESSION['mensaje'])) { ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $_SESSION['mensaje']; ?>
                    </div>
                    <?php unset($_SESSION['mensaje']); ?>
                <?php } elseif (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= $_SESSION['error']; ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>