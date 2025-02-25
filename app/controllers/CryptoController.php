<?php
require_once "app/models/CryptoModel.php";

class CryptoController
{

    //Metodo que manda a llamar a home.php, la cual tiene la informacion real de las criptomonedas
    public function index()
    {
        require "app/views/home.php";
    }

    //Metodo que manda a llamar a home.php, la cual tiene la informacion real de las criptomonedas
    public function compraVenta()
    {
        require "app/views/wallet.php";
    }

    //Metodo que aplica la logica para comprar criptomonedas
    public function comprar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cripto = $_POST['cripto'] ?? '';
            $cantidad = floatval($_POST['cantidad'] ?? 0);

            $cryptoModel = new Crypto();
            $mensaje = $cryptoModel->comprar($cripto, $cantidad);

            if (strpos($mensaje, "Compra exitosa")) {
                $_SESSION['exito'] = $mensaje;
            } else {
                $_SESSION['error'] = $mensaje;
            }

            header("Location: /cripto-simulator/Crypto/compraSuccess");
            exit();
        }
    }

    //Metodo para simular el vender criptomonedas
    public function vender()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cripto = $_POST['cripto'] ?? '';
            $cantidad = floatval($_POST['cantidad'] ?? 0);

            $cryptoModel = new Crypto();
            $mensaje = $cryptoModel->vender($cripto, $cantidad);

            if (strpos($mensaje, "Venta exitosa")) {
                $_SESSION['exito'] = $mensaje;
            } else {
                $_SESSION['error'] = $mensaje;
            }
        }
        header("Location: /cripto-simulator/Crypto/ventaSuccess");
        exit();
    }

    //Metodo para simular la actualizacion de precios de las criptomonedas
    public function actualizarPrecios()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Simulación de actualización de precios
        $_SESSION['precios'] = [
            "BTC" => rand(40000, 45000),
            "ETH" => rand(2500, 3500),
            "ADA" => rand(1, 3),
            "XRP" => rand(1, 2.5),
            "LTC" => rand(100, 200)
        ];

        header("Location: /cripto-simulator/Crypto/index");
        exit();
    }

    //Metodo que genera la vista de exito al hacer una compra
    public function compraSuccess()
    {
        require "app/views/compraSuccess.php";
    }

    //Metodo que genera la vista de exito al hacer una venta
    public function ventaSuccess()
    {
        require "app/views/ventaSuccess.php";
    }
}
