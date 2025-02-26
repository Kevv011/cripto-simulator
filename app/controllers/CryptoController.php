<?php
require_once "app/models/CryptoModel.php";

class CryptoController
{

    //Metodo que manda a llamar a home.php, la cual tiene la informacion real de las criptomonedas
    public function index()
    {
        require "app/views/home.php";
    }

    //Metodo que manda a llamar a wallet.php, la cual tiene la informacion real de las criptomonedas del usuario, compra y venta de las mismas
    public function billetera()
    {
        require "app/views/wallet.php";
        require "app/views/home.php";
    }

    //Metodo que aplica la logica para comprar criptomonedas
    public function comprar()
    {

        //Se verifica si se han mandado datos con POST desde la vista home.php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Variables que guardan los datos enviados con POST
            $cripto = $_POST['cripto'] ?? '';
            $cantidad = floatval($_POST['cantidad'] ?? 0);

            //Instancia del modelo CryptoModel.php para implementar la logica del metodo de comprar criptomonedas
            $cryptoModel = new Crypto();
            $mensaje = $cryptoModel->comprar($cripto, $cantidad);

            //Se verifica si la compra fue exitosa o erronea
            if (strpos($mensaje, "Compra exitosa")) {
                $_SESSION['exito'] = $mensaje;
            } else {
                $_SESSION['error'] = $mensaje;
            }

            //Se envia la respuesta de exito o error a la vista compraSuccess.php
            header("Location: /cripto-simulator/Crypto/compraSuccess");
            exit();
        }
    }

    //Metodo para simular el vender criptomonedas
    public function vender()
    {
        //Se verifica que se hayan enviado datos con POST desde la vista home.php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Variables que guardan la informacion enviada con POST
            $cripto = $_POST['cripto'] ?? '';
            $cantidad = floatval($_POST['cantidad'] ?? 0);

            //Instancia de clase del modelo cryptoModel.php para implementar el metodo  de vender criptomonedas
            $cryptoModel = new Crypto();
            $mensaje = $cryptoModel->vender($cripto, $cantidad);

            //Se verifica si la venta fue exitosa o erronea
            if (strpos($mensaje, "Venta exitosa")) {
                $_SESSION['exito'] = $mensaje;
            } else {
                $_SESSION['error'] = $mensaje;
            }
        }

        //Vista donde se imprime el resultado de la venta
        header("Location: /cripto-simulator/Crypto/ventaSuccess");
        exit();
    }

    //Metodo para simular la actualizacion de precios de las criptomonedas
    public function actualizarPrecios()
    {
        //Verifica si la sesion no ha sido activada con PHP_SESSION_NONE
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Simulación de actualización de precios con valores aleatorios con funcion rand()
        $_SESSION['precios'] = [
            "BTC" => rand(40000, 45000),
            "ETH" => rand(2500, 3500),
            "ADA" => rand(1, 3),
            "XRP" => rand(1, 2.5),
            "LTC" => rand(100, 200)
        ];

        // Forma de obtener la ruta sin el parametro GET (Usado esto para poder ver la actualizacion en vista principal y la billetera)
        $url_vista = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // HTTP_REFEER identifica desde que vista el usuario ha llegado a la actual y es usado para manejar las actualizaciones de precios de las criptomonedas
        // y que no haya problema entre vistas (Este metodo es usado en 2 vistas)
        if (!empty($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Redirección por defecto si no hay HTTP_REFERER
        if ($url_vista !== "/cripto-simulator/Crypto/index") {
            header("Location: /cripto-simulator/Crypto/billetera");
        } else {
            header("Location: /cripto-simulator/Crypto/index");
        }
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
