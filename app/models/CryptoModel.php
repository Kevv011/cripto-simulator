<?php

class Crypto {

    //Metodo para devolver los "precios" y usarse para ver su actualizacion desde el controlador
    public function getPrecios() {
        return $_SESSION['precios'];
    }

    //Metodo para simular la compra de criptomonedas
    public function comprar($cripto, $cantidad) {

        $precio = $_SESSION['precios'][$cripto] ?? 0; //Se obtiene el precio de la $cripto almacenada en el array PRECIOS
        $costoTotal = $precio * $cantidad;            //Se opera el precio * cantidad para obtener el TOTAL

        if ($_SESSION['saldo'] >= $costoTotal) {      //Si el saldo registrado es >= al TOTAL, se realiza la compra

            $_SESSION['saldo'] -= $costoTotal;      
            $_SESSION['criptos'][$cripto] = ($_SESSION['criptos'][$cripto] ?? 0) + $cantidad; //La cantidad de esa criptomoneda aumenta con la $cantidad
            return "Compra exitosa: $cantidad de $cripto.";

        } else {  //Si no, se deniega
            return "Saldo insuficiente.";
        }
    }

    //Metodo para vender criptomonedas
    public function vender($cripto, $cantidad) {
        if (isset($_SESSION['criptos'][$cripto]) && $_SESSION['criptos'][$cripto] >= $cantidad) {

            $precio = $_SESSION['precios'][$cripto];
            $_SESSION['saldo'] += $precio * $cantidad;
            $_SESSION['criptos'][$cripto] -= $cantidad;

            if ($_SESSION['criptos'][$cripto] == 0) {
                unset($_SESSION['criptos'][$cripto]); // Elimina la cripto si la cantidad es 0
            }
            return "Venta exitosa: $cantidad de $cripto.";
        } else {
            return "No tienes suficientes $cripto para vender.";
        }
    }
}
