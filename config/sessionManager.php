<?php
session_start();
require_once "app/controllers/CryptoController.php";

class SessionManager
{

    //Metodo que inicia sesion de varias variables
    public static function login()
    {

        // Inicia sesion de "amount" en $1000
        if (!isset($_SESSION['saldo'])) {
            $_SESSION['saldo'] = 1000;
        }

        // Se inicia sesion de array "criptos", la cual guardas la cantidad de criptomonedas del usuario
        if (!isset($_SESSION['criptos'])) {
            $_SESSION['criptos'] = [];
        }

        // Se inicia sesion de array "Usuario" para determinar que hay un usuario logueado
        if (!isset($_SESSION['usuario'])) {
            $_SESSION['usuario'] = '';
            $_SESSION['contraseña'] = '';
        }

        //Inicia sesion de "Precios" para actualizarlos en cada recarga (Guarda el nombre y precio en un array asociativo desde el controlador)
        if (!isset($_SESSION['precios'])) {
            $cryptoController = new CryptoController();
            $cryptoController->actualizarPrecios();
        }
    }
}
